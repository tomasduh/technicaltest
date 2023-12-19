<?php 



// URL API to get client domains
$api_url = 'https://api.demo.sitehost.co.nz/1.0/srs/list_domains.json?client_id=293785&apikey=d17261d51ff7046b760bd95b4ce781ac';

// Get API infomation
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Apply json_decode to get array
$domains = json_decode($response, true);
// Show domains on web page
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Domain List - Client #293785</title>
</head>
<body>
    <h1>Domain List Client #293785</h1>
    <?php if (!empty($domains)) : ?>
        <ul>
            <?php foreach ($domains as $domain) : ?>
                <?php foreach ($domain['data'] as $data) : ?>
                    <li><strong>Domain:</strong> <?php echo $data['domain']; ?><br></li>
                    <li><strong>State:</strong> <?php echo $data['state']; ?><br></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Not Found Domain List</p>
    <?php endif; ?>
</body>
</html>
