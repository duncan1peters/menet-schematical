<?php
require_once('_config.inc.php');
MLCApplication::InitPackage('MDE');
MDEApplication::S3Put(__TMP_DIR__ . '/mde_codebase.zip', 'mde_official.latest.zip');
