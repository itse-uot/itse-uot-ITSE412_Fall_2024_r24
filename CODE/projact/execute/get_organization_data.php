<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // الحصول على OrganizationID من الجلسة
    $organizationId = isset($_POST['orginazationid']) ? $_POST['orginazationid'] : $_SESSION['org']; 

    $query = "SELECT OrganizationName, Description, Field, OrganizationPicture, Location, ContactEmail, PhoneNumber FROM organizations WHERE OrganizationID = :organizationId";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['organizationId' => $organizationId]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'OrganizationName' => $data['OrganizationName'],
                    'Description' => $data['Description'],
                    'Field' => $data['Field'],
                    'OrganizationPicture' => base64_encode($data['OrganizationPicture']),
                    'Location' => $data['Location'],
                    'ContactEmail' => $data['ContactEmail'],
                    'PhoneNumber' => $data['PhoneNumber']
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لا توجد بيانات.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>