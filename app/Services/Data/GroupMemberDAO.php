<?php
namespace App\Services\Data;

use App\Services\Models\GroupMember;
use Carbon\Exceptions\Exception;

class GroupMemberDAO
{

    public function createGroupMember(GroupMember $member)
    {
        try {
            $databaseConnection = new DatabaseConnection();
            $conn = $databaseConnection->getConnection();

            $checkGroupExist = "SELECT * FROM member WHERE userID = '" . $member->getUserId() . "' AND groupID = '" . $member->getGroupId() . "'";
            $result = $conn->query($checkGroupExist);

            if ($result->num_rows > 0) {

                $my_sql = "UPDATE member SET isActive = true WHERE userID = '" . $member->getUserId() . "' AND groupID = '" . $member->getGroupId() . "'";
                $result = mysqli_query($conn, $my_sql);
                $conn->close();
                return true;
            } else {

                // Query to the database
                $sql_query = "INSERT INTO member
                                (UserID, GroupID, isActive)
                              VALUES('" . $member->getUserId() . "','" . $member->getGroupId() . "', '" . $member->getIsActive() . "')";

                // Execute the query for a result
                if (mysqli_query($conn, $sql_query)) {
                    $conn->close();
                    return true;
                } else {
                    $conn->close();
                    return false;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function leaveGroup(GroupMember $member)
    {
        try {
            $databaseConnection = new DatabaseConnection();
            $conn = $databaseConnection->getConnection();
            $my_sql = "UPDATE member SET isActive = false WHERE userID = '" . $member->getUserId() . "' AND groupID = '" . $member->getGroupId() . "'";
            $result = mysqli_query($conn, $my_sql);
            $conn->close();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

