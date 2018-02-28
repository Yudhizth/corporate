<?php

                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                 $page=$_GET["p"];        
                switch ($page){

                    case"editProfile":
                        include "editProfile.php";
                        break;
                    case"listProject":
                        include "listProject.php";
                        break;
                    case"infoReq":
                        include "infoReq.php";
                    break;
                    case"detailKaryawan":
                        include "detailKaryawan.php";
                    break;
                    case"detailProject":
                        include "detailProject.php";
                        break;
                    case"detail":
                        include "detail.php";
                    break;
                    case"complain":
                        include "komplain.php";
                    break;
                    case"detailKomplain":
                        include "detailKomplain.php";
                    break;
                    case"req":
                        include "requestPerusahaan.php";
                    break;
                    case"reqBPO":
                        include "requestPerusahaanBPO.php";
                    break;
                    case"reqMPO":
                        include "requestPerusahaanMPO.php";
                    break;
                    case"reqSYS":
                        include 'requestPerusahaanSYS.php';
                    break;
                    case"KST":
                        include 'requestPerusahaanKST.php';
                    break;
                    case"info":
                        include "informasi.php";
                    break;
                    case"default":
                        include "kebutuhan.php";
                        break;
                    default:
                        include ('default.php');
                        break;
                        
                }
?>