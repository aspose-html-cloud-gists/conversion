        $fileName = "test1.html";
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $resultFile = "HtmlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".pdf";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
