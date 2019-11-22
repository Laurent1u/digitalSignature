<?php
if(isset($_POST['signaturesubmit'])){
    $signature = $_POST['signature'];
    $signatureFileName = uniqid().'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = 'signatures/'.$signatureFileName;
    file_put_contents($file, $data);
    $msg = "<div class='alert alert-success'>Signature Uploaded</div>";
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:300px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br>
            <?php echo isset($msg)?$msg:''; ?>
            <h2 class="text-center">Signature Pad</h2>
            <hr>
            <div id="canvasDiv"></div>
            <br>
            <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
            <button type="button" class="btn btn-success" id="btn-save">Save</button>
        </div>
        <form id="signatureform" action="" style="display:none" method="post">
            <input type="hidden" id="signature" name="signature">
            <input type="hidden" name="signaturesubmit" value="1">
        </form>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if (isset($signatureFileName)) { ?>
                <img src="<?php echo $file; ?>" alt="semnatura">
            <?php } ?>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="canvas.js"></script>