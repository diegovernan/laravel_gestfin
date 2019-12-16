<?php

function translatedMonth($month)
{
    switch ($month) {
        case '1':
            $translatedMonth = "Janeiro";
            break;
        case '2':
            $translatedMonth = "Fevereiro";
            break;
        case '3':
            $translatedMonth = "Março";
            break;
        case '4':
            $translatedMonth = "Abril";
            break;
        case '5':
            $translatedMonth = "Maio";
            break;
        case '6':
            $translatedMonth = "Junho";
            break;
        case '7':
            $translatedMonth = "Julho";
            break;
        case '8':
            $translatedMonth = "Agosto";
            break;
        case '9':
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