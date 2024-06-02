<?php
session_start();
include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$userId = $data['userId'];

if (isset($_SESSION['username'])) {
  // Increment the reports count
  $sql = "UPDATE users SET reports = reports + 1 WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $userId);

  if ($stmt->execute()) {
    // Check the updated report count
    $checkSql = "SELECT reports FROM users WHERE id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param('i', $userId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $user = $result->fetch_assoc();

    if ($user['reports'] > 3) {
      // Delete the user account if reports exceed 3
      $deleteSql = "DELETE FROM users WHERE id = ?";
      $deleteStmt = $conn->prepare($deleteSql);
      $deleteStmt->bind_param('i', $userId);

      if ($deleteStmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'User deleted due to excessive reports.']);
      } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete user.']);
      }
    } else {
      echo json_encode(['success' => true, 'message' => 'User reported successfully.']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Failed to report user.']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'User not logged in.']);
}
?>
