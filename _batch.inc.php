<?php

MLCApplication::InitPackage('MLCSalesTools');
//MLCBatchDriver::AddJob('twitter', new MSTTwitterSearchBatch());
MLCBatchDriver::AddJob('highrise', new MSTAddSignUpUserToHiriseRecivedBatch());//
MLCBatchDriver::AddJob('emails_recived', new MSTEmailRecivedBatch());//
