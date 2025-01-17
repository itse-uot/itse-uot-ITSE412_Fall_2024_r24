<?php
include 'dbconfig.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'get_data') {
    $volunteerId = $_POST['volunteerId'];

    $query = "SELECT FullName, ContactEmail, Skills, ContactNumber, ProfilePicture FROM Volunteers WHERE VolunteerID = :volunteerId";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['volunteerId' => $volunteerId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'FullName' => htmlspecialchars($data['FullName']),
                    'ContactEmail' => htmlspecialchars($data['ContactEmail']),
                    'Skills' => htmlspecialchars($data['Skills']),
                    'ContactNumber' => htmlspecialchars($data['ContactNumber']),
                    'ProfilePicture' => $data['ProfilePicture']
                        ? 'data:image/jpeg;base64,' . base64_encode($data['ProfilePicture'])
                        : 'assets/img/default-profile.png',
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لا توجد بيانات']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>