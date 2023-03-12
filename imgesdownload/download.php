<?php
if(isset($_POST['url'])){ // Eğer form gönderildi ise devam et

    $url = $_POST['url']; // Kullanıcının girdiği URL'yi al

    // URL'deki dosya uzantısını al
    // pathinfo() fonksiyonu, bir dosya yolu dizisi veya URL'si verildiğinde dosya hakkında bilgi verir
    $extension = pathinfo($url, PATHINFO_EXTENSION); 

    // Eğer URL'deki dosya uzantısı geçerli bir resim uzantısı ise (jpg, jpeg, png)
    // ve uzantı boş değilse devam et
    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" && !empty($extension)) {

        // Resim dosyasını al
        $image = file_get_contents($url);

        // İndirilebilir bir içerik türü olarak tanımla
        header("Content-Type: application/force-download");

        // İndirilen dosyanın adını belirle
        header("Content-Disposition: attachment; filename=".basename($url));

        // Tamponları temizle
        ob_clean();  
        flush();     

        // Resmi göster
        echo $image; 

        // İşlemi sonlandır
        exit();
    } 
    // Geçersiz bir uzantı varsa
    else { 
        $error = "";
        // URL'nin son 4 karakterini alarak dosya uzantısını belirle
        $extension = substr($url, -4); 

        // Geçerli uzantılar listesi
        $valid_extensions = array(".jpg", ".jpeg", ".png", ".gif"); 

        // Geçersiz bir uzantı varsa hata mesajı oluştur ve kullanıcıyı index.php sayfasına yönlendir
        if (!in_array($extension, $valid_extensions)) {
            $error="Hata: URL resim uzantısı değil!";
            header("Location: index.php?error=" . urlencode($error) . "&url=" . (isset($url) ? urlencode($url) : ""));
            exit();
        }
    }
   
}
?>


