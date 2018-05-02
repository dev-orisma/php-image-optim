<?php

namespace PHPImageOptim\Tools\Jpeg;
use PHPImageOptim\Tools\ToolsInterface;
use PHPImageOptim\Tools\Common;
use Exception;

class JpegOptim extends Common implements ToolsInterface
{

    public function optimise()
    {
        echo $cmd = $this->binaryPath . ' --strip-all --all-progressive -m85 "' . $this->imagePath . '"';
        exec($cmd, $aOutput, $iResult);
         // /usr/bin/jpegoptim --strip-all --all-progressive -m80 /mnt/shared/Project/01A-Active/DIT16A-WEBS2016/website/httpdocs/stocks/c880x440/media/000e83.jpg

        if ($iResult != 0)
        {
            throw new Exception('JpegOptim was unable to optimise image, result:' . $iResult . ' File: ' . $this->imagePath);
        }

        return $this;
    }

    public function checkVersion()
    {
        exec($this->binaryPath . ' --version', $aOutput, $iResult);
    }
}