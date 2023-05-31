<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Pakar Komputer</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="<?= base_url('web.kit/css/') ?>login_style.css">

</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->



            <input type="text" id="nameId" class="fadeIn second" placeholder="Masukkan nama anda">
            <input type="submit" class="fadeIn fourth" id="startdiagnose" value="Mulai" onclick="javascript:Start()">

            <script>
                $(document).ready(function() {
                    $('#nameId').val('');
                    $('#nameId').focus();
                });
                $('#nameId').keypress(function(e) {
                    var key = e.which;
                    if (key == 13) {
                        $('#startdiagnose').click();
                        return false;
                    }
                });

                function Start() {
                    const data_sent = {
                        userName: $('#nameId').val()
                    };

                    $.post("<?= base_url('Web/start') ?>", {
                        data: data_sent
                    }, (ResponseFromServer) => {
                        if (ResponseFromServer.status === true) {
                            window.location.replace("<?= base_url('/diagnosa'); ?>");
                        }
                    });
                }
            </script>

        </div>
    </div>

</body>

</html>