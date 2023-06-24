<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

class DFeController extends Controller
{
    public function index()
    {
        //var_dump(php_ini_loaded_file(), php_ini_scanned_files());
        //dd(OPENSSL_VERSION_NUMBER);
        dd(phpinfo());
        return "View index do controller DFe";
    }

    public function status()
    {
        try {
            $configJson = '{
                "atualizacao":"2015-10-02 06:01:21",
                "tpAmb":2,
                "razaosocial":"Invictos Tecnologia",
                "siglaUF":"MS",
                "cnpj":"11758339000178",
                "schemes":"PL_008i2",
                "versao":"4.00",
                "tokenIBPT":"AAAAAAA",
                "CSC":"432b9e6b9cb9521551505f545728d62931ea",
                "CSCid":"000001",
                "aProxyConf":{
                    "proxyIp":"",
                    "proxyPort":"",
                    "proxyUser":"",
                    "proxyPass":""
                }
            }';
            echo 'Carregando arquivo certificado<br>';
            $pfx = file_get_contents('/var/www/html/laravel/2023_2023_invictos.pfx');
            echo 'Arquivo certificado carregado<br>';

            //dd($pfx);
            $password = 'Invi1234ctos';

            echo 'carregando certificado no componente NFePHP<br>';
            
            $certificate = Certificate::readPfx($pfx, $password);
            
            echo 'certificado carregado no componente NFePHP<br>';
            
            $tools = new Tools($configJson, $certificate);
            $tools->model('55');
            
            $uf = 'MS';
            $tpAmb = 2;
            echo 'Consultando sefaz<br>';
            $response = $tools->sefazStatus($uf,$tpAmb);
            echo 'Consulta Realizada<br>';
            
            $stdCl = new Standardize($response);
            $std = $stdCl->toStd();
            $array = $stdCl->toArray();
            $json = $stdCl->toJson();

            dd($response,$std,$array,$json);


        } catch (\Exception $e) {
            return $e->getMessage();
        }


        return "View status do controller DFe";
    }
}
