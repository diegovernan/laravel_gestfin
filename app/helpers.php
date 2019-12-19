<?php

function moneyFormat($value)
{
    $formatedValue = number_format($value, 2, ',', '.');
    return "R$ " . $formatedValue;
}

function translatedMonth($month)
{
    switch ($month) {
        case '01':
            $translatedMonth = "Janeiro";
            break;
        case '02':
            $translatedMonth = "Fevereiro";
            break;
        case '03':
            $translatedMonth = "Março";
            break;
        case '04':
            $translatedMonth = "Abril";
            break;
        case '05':
            $translatedMonth = "Maio";
            break;
        case '06':
            $translatedMonth = "Junho";
            break;
        case '07':
            $translatedMonth = "Julho";
            break;
        case '08':
            $translatedMonth = "Agosto";
            break;
        case '09':
            $translatedMonth = "Setembro";
            break;
        case '10':
            $translatedMonth = "Outubro";
            break;
        case '11':
            $translatedMonth = "Novembro";
            break;
        case '12':
            $translatedMonth = "Dezembro";
            break;
    }
    return $translatedMonth;
}
