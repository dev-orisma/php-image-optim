<?php

namespace PHPImageOptim\Tools\Png;
use PHPImageOptim\Tools\ToolsInterface;
use PHPImageOptim\Tools\Common;
use Exception;

class PngQuant extends Common implements ToolsInterface
{
    public function optimise()
    {
        exec($this->binaryPath . ' --ext=.png --force "' . $this->imagePath . '" --quality 90', $aOutput, $iResult);
        if ($iResult != 0)
        {
            throw new Exception('PNGOUT was Unable to optimise image, result:' . $iResult . ' File: ' . $this->binaryPath);
        }

        return $this;
    }

    public function checkVersion()
    {
        exec($this->binaryPath . ' --version', $aOutput, $iResult);
    }
}
