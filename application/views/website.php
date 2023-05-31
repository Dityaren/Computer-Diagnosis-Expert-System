<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Pakar Komputer</title>

    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('web.kit/css/style.css'); ?>">
</head>

<body>



    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">SYSTEM PAKAR KOMPUTER</h6>
                                        <small>
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <a href="<?= base_url('web/logout'); ?>" class="btn btn-outline-danger"><i class="fa fa-chain-broken "></i></a>
                                </div>
                            </div>
                        </div>
                        <div class=" chat-history">
                            <ul class="m-b-0">
                                <li class="clearfix" id="bot1Container" style="display:none;">

                                    <div class="message my-message">Halo, <?= $username; ?>. Silahkan pilih gejala yang komputer anda alami.</div>
                                </li>
                                <li class="clearfix" id="symptomFormContainer" style="display: none;">
                                    <div class="message-data text-right">
                                        <span class="message-data-time "><?= $username; ?></span>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                    </div>
                                    <div class="message other-message float-right">
                                        <div class="text-left">
                                            <form id="symptomsForm">
                                                Gejala yang komputer saya alami adalah:

                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" id="symptom1" value="G1">
                                                    <label class="form-check-label" for="symptom1">Komputer tidak menyala</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom2" value="G2">
                                                    <label class="form-check-label" for="symptom2">Komputer hidup tapi layar tidak menyala</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom3" value="G3">
                                                    <label class="form-check-label" for="symptom3">Komputer berbunyi keras saat dihidupkan</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom4" value="G4">
                                                    <label class="form-check-label" for="symptom4">Komputer sering restart sendiri</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom5" value="G5">
                                                    <label class="form-check-label" for="symptom5">Komputer sering hang atau lambat</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom6" value="G6">
                                                    <label class="form-check-label" for="symptom6">Blue screen atau error message muncul secara tiba-tiba</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom7" value="G7">
                                                    <label class="form-check-label" for="symptom7">Suara tidak keluar</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom8" value="G8">
                                                    <label class="form-check-label" for="symptom8">Keyboard atau mouse tidak berfungsi</label>
                                                </div>
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="checkbox" id="symptom9" value="G9">
                                                    <label class="form-check-label" for="symptom9">Internet tidak terhubung atau lambat</label>
                                                </div>
                                                <button type="submi" id="submit_button" class="btn btn-primary mt-2"><i class="fa fa-paper-plane"></i> Kirim</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <div id="diagnosisResult" class="mt-4">


                                </div>



                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            Created with <span class="text-danger">❤</span> by Kelompok 3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#bot1Container").fadeIn();
            }, 500);
            setTimeout(function() {
                $("#symptomFormContainer").fadeIn();
            }, 1000);

            var diagnosisTable = {
                "G1": ["D1", "D2", "D3"],
                "G2": ["D1", "D3", "D4", "D5", "D6", "D16", "D18", "D19"],
                "G3": ["D1", "D3", "D7", "D8", "D9", "D22"],
                "G4": ["D3", "D5", "D7", "D8", "D10", "D13"],
                "G5": ["D5", "D7", "D8", "D11", "D12", "D13", "D14", "D15", "D21"],
                "G6": ["D3", "D5", "D7", "D8", "D10", "D13", "D14", "D15", "D21"],
                "G7": ["D3", "D6", "D16", "D17", "D18"],
                "G8": ["D8", "D16", "D17", "D19"],
                "G9": ["D20", "D21", "D22"]
            };

            function getSymptomDescription(symptomCode) {
                switch (symptomCode) {
                    case 'G1':
                        return 'Komputer tidak menyala';
                    case 'G2':
                        return 'Komputer hidup tapi layar tidak menyala';
                    case 'G3':
                        return 'Komputer berbunyi keras saat dihidupkan';
                    case 'G4':
                        return 'Komputer sering restart sendiri';
                    case 'G5':
                        return 'Komputer sering hang atau lambat';
                    case 'G6':
                        return 'Blue screen atau error message muncul secara tiba-tiba';
                    case 'G7':
                        return 'Suara tidak keluar dari speaker atau headphone meskipun terhubung';
                    case 'G8':
                        return 'Keyboard atau mouse tidak berfungsi';
                    case 'G9':
                        return 'Internet tidak terhubung atau lambat';
                    default:
                        return '';
                }
            }

            $('#symptomsForm').submit(function(event) {
                $("#submit_button").prop("disabled", true);
                var btn_default = $("#submit_button").html();
                $("#submit_button").html('<i class="spinner-border spinner-border-sm" aria-hidden="true"></i> Proses');
                event.preventDefault();
                var selectedSymptoms = [];
                $("input[type=checkbox]:checked").each(function() {
                    selectedSymptoms.push($(this).val());
                });
                var diagnosis = [];
                for (var i = 0; i < selectedSymptoms.length; i++) {
                    var symptomCode = selectedSymptoms[i];
                    diagnosis = diagnosis.concat(diagnosisTable[symptomCode]);
                }
                var resultHtml = '<li class="clearfix" id="hasilContainer" style="display:none;"><div class="message my-message">';
                if (diagnosis.length > 0) {
                    resultHtml += '<p>Berdasarkan gejala yang dipilih, kemungkinan kerusakan komputer Anda adalah:</p>';
                    resultHtml += '';
                    for (var j = 0; j < diagnosis.length; j++) {
                        resultHtml += '' + getDiagnosisDetails(diagnosis[j]) + '<br>';
                    }
                    resultHtml += '';
                } else {
                    resultHtml += '<p>Tidak ada diagnosis yang cocok berdasarkan gejala yang dipilih.</p>';
                }
                resultHtml += '</div></li>';
                $('#diagnosisResult').html(resultHtml);
                setTimeout(function() {
                    $("#hasilContainer").fadeIn();
                    $("#submit_button").html(btn_default);
                    $("#submit_button").prop("disabled", false);
                }, 500);
            });

            function getDiagnosisDetails(diagnosisCode) {
                switch (diagnosisCode) {
                    case 'D1':
                        return 'Kerusakan pada daya listrik atau kabel power';
                    case 'D2':
                        return 'Kerusakan pada power supply';
                    case 'D3':
                        return 'Kerusakan pada motherboard';
                    case 'D4':
                        return 'Kerusakan pada kartu grafis';
                    case 'D5':
                        return 'Kerusakan pada RAM';
                    case 'D6':
                        return 'Kerusakan pada monitor';
                    case 'D7':
                        return 'Kerusakan pada hard drive atau SSD';
                    case 'D8':
                        return 'Kerusakan pada CPU';
                    case 'D9':
                        return 'Kerusakan pada cooling system';
                    case 'D10':
                        return 'Kerusakan pada kipas CPU';
                    case 'D11':
                        return 'Kerusakan pada sistem operasi';
                    case 'D12':
                        return 'Kerusakan pada hard drive atau SSD';
                    case 'D13':
                        return 'Kerusakan pada software';
                    case 'D14':
                        return 'Kerusakan pada driver';
                    case 'D15':
                        return 'Kerusakan pada registry';
                    case 'D16':
                        return 'Kerusakan pada kartu suara';
                    case 'D17':
                        return 'Kerusakan pada port audio';
                    case 'D18':
                        return 'Kerusakan pada speaker atau headphone';
                    case 'D19':
                        return 'Kerusakan pada keyboard atau mouse';
                    case 'D20':
                        return 'Kerusakan pada jaringan lokal (LAN)';
                    case 'D21':
                        return 'Kerusakan pada jaringan internet';
                    case 'D22':
                        return 'Kerusakan pada modem atau router';
                    default:
                        return '';
                }
            }
        });
    </script>

</body>

</html>