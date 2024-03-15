<!-- <?php
include "../../koneksi/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topupId = isset($_POST["topup_id"]) ? $_POST["topup_id"] : null;
    $userId = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : null;
    $topup_status = isset($_POST["action"]) ? $_POST["action"] : null;

    $updateSql = $conn->prepare("UPDATE transaksi SET topup_status = ? WHERE id = ?");
    $updateSql->bind_param("si", $topup_status, $topupId);

    if ($updateSql->execute() === TRUE) {
        if ($topup_status == "approve") {
            $getUserSql = $conn->prepare("SELECT kredit FROM users WHERE id = ?");
            $getUserSql->bind_param("i", $userId);
            $getUserSql->execute();
            $userResult = $getUserSql->get_result();

            if ($userResult->num_rows > 0) {
                $userRow = $userResult->fetch_assoc();
                $currentKredit = $userRow["kredit"];
                $newKredit = $currentKredit + $amount;

                $updateKreditSql = $conn->prepare("UPDATE users SET kredit = ? WHERE id = ?");
                $updateKreditSql->bind_param("ii", $newKredit, $userId);

                if ($updateKreditSql->execute() !== TRUE) {
                    echo "Error updating kredit: " . $updateKreditSql->error;
                }
            } else {
                echo "User not found.";
            }

            $getUserSql->close();
            $updateKreditSql->close();
        }

        echo "<script>alert('Status top-up berhasil diupdate.')</script>";
        echo "<script>window.location.href = '../viewTransaction.php';</script>";
    } else {
        echo "Error updating top-up status: " . $updateSql->error;
    }

    $updateSql->close();
}
?> -->


<?php
include "../../koneksi/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topupId = isset($_POST["topup_id"]) ? $_POST["topup_id"] : null;
    $userId = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : null;
    $topup_status = isset($_POST["action"]) ? $_POST["action"] : null;

    $updateSql = $conn->prepare("UPDATE transaksi SET topup_status = ? WHERE id = ?");
    $updateSql->bind_param("si", $topup_status, $topupId);

    if ($updateSql->execute() === TRUE) {
        if ($topup_status == "approve") {
            $getUserSql = $conn->prepare("SELECT kredit FROM users WHERE id = ?");
            $getUserSql->bind_param("i", $userId);
            $getUserSql->execute();
            $userResult = $getUserSql->get_result();

            if ($userResult->num_rows > 0) {
                $userRow = $userResult->fetch_assoc();
                $currentKredit = $userRow["kredit"];
                $newKredit = $currentKredit + $amount;

                $updateKreditSql = $conn->prepare("UPDATE users SET kredit = ? WHERE id = ?");
                $updateKreditSql->bind_param("ii", $newKredit, $userId);

                if ($updateKreditSql->execute() !== TRUE) {
                    echo "Error updating kredit: " . $updateKreditSql->error;
                }
            } else {
                echo "User not found.";
            }

            $getUserSql->close();
            $updateKreditSql->close();

            // Hapus data dari tabel topup
            $deleteTopupSql = $conn->prepare("DELETE FROM transaksi WHERE id = ?");
            $deleteTopupSql->bind_param("i", $topupId);

            if ($deleteTopupSql->execute() !== TRUE) {
                echo "Error deleting topup data: " . $deleteTopupSql->error;
            }

            $deleteTopupSql->close();
        }

        echo "<script>alert('Status top-up berhasil diupdate.')</script>";
        echo "<script>window.location.href = '../viewTransaction.php';</script>";
    } else {
        echo "Error updating top-up status: " . $updateSql->error;
    }

    $updateSql->close();
}
?>
