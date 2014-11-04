<?php
/**
 * User: semihs
 * Date: 4.11.14
 * Time: 14:15
 */

namespace NocMed\TinyUrl\Service;

class TinyUrlService {

    public $configs;

    /**
     * @return mixed
     */
    public function getConfigs()
    {
        return $this->configs;
    }

    /**
     * @param mixed $configs
     */
    public function setConfigs($configs)
    {
        $this->configs = $configs;
    }

    public function alphaID($in, $toNum = false, $padUp = false, $passKey = null)
    {
        $configs = $this->getConfigs();
        if (empty($configs['noc-med-zf2-tinyurl']) || empty($configs['noc-med-zf2-tinyurl']['index'])) {
            throw new \Exception('index config is required');
        }
        $index = $configs['noc-med-zf2-tinyurl']['index'];

        $out   =   '';
        $base  = strlen($index);

        if ($passKey !== null) {
            for ($n = 0; $n < strlen($index); $n++) {
                $i[] = substr($index, $n, 1);
            }

            $passHash = hash('sha256',$passKey);
            $passHash = (strlen($passHash) < strlen($index) ? hash('sha512', $passKey) : $passHash);

            for ($n = 0; $n < strlen($index); $n++) {
                $p[] =  substr($passHash, $n, 1);
            }

            array_multisort($p, SORT_DESC, $i);
            $index = implode($i);
        }

        if ($toNum) {
            $len = strlen($in) - 1;

            for ($t = $len; $t >= 0; $t--) {
                $bcp = bcpow($base, $len - $t);
                $out = $out + strpos($index, substr($in, $t, 1)) * $bcp;
            }

            if (is_numeric($padUp)) {
                $padUp--;

                if ($padUp > 0) {
                    $out -= pow($base, $padUp);
                }
            }
        } else {
            if (is_numeric($padUp)) {
                $padUp--;

                if ($padUp > 0) {
                    $in += pow($base, $padUp);
                }
            }

            for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) {
                $bcp = bcpow($base, $t);
                $a   = floor($in / $bcp) % $base;
                $out = $out . substr($index, $a, 1);
                $in  = $in - ($a * $bcp);
            }
        }

        return $out;
    }
} 