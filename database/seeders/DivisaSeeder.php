<?php

namespace Database\Seeders;

use App\Helper\SeederHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisaSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_DIVISA_FORMAT_DATA = array(

            [ "id" => "1", "div_pais" => "Albania", "div_moneda" => "Leke", "div_codigo" => "ALL", "div_simbolo" => "Lek","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "2", "div_pais" => "America", "div_moneda" => "Dollars", "div_codigo" => "USD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "3", "div_pais" => "Afghanistan", "div_moneda" => "Afghanis", "div_codigo" => "AF", "div_simbolo" => "؋","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "4", "div_pais" => "Argentina", "div_moneda" => "Pesos", "div_codigo" => "ARS", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "5", "div_pais" => "Aruba", "div_moneda" => "Guilders", "div_codigo" => "AWG", "div_simbolo" => "ƒ","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "6", "div_pais" => "Australia", "div_moneda" => "Dollars", "div_codigo" => "AUD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "7", "div_pais" => "Azerbaijan", "div_moneda" => "New Manats", "div_codigo" => "AZ", "div_simbolo" => "ман","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "8", "div_pais" => "Bahamas", "div_moneda" => "Dollars", "div_codigo" => "BSD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "9", "div_pais" => "Barbados", "div_moneda" => "Dollars", "div_codigo" => "BBD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "10", "div_pais" => "Belarus", "div_moneda" => "Rubles", "div_codigo" => "BYR", "div_simbolo" => "p.","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "11", "div_pais" => "Belgium", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "12", "div_pais" => "Beliz", "div_moneda" => "Dollars", "div_codigo" => "BZD", "div_simbolo" => "BZ$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "13", "div_pais" => "Bermuda", "div_moneda" => "Dollars", "div_codigo" => "BMD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "14", "div_pais" => "Bolivia", "div_moneda" => "Bolivianos", "div_codigo" => "BOB", "div_simbolo" => '$b',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "15", "div_pais" => "Bosnia and Herzegovina", "div_moneda" => "Convertible Marka", "div_codigo" => "BAM", "div_simbolo" => "KM","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "16", "div_pais" => "Botswana", "div_moneda" => "Pula's", "div_codigo" => "BWP", "div_simbolo" => "P","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "17", "div_pais" => "Bulgaria", "div_moneda" => "Leva", "div_codigo" => "BG", "div_simbolo" => "лв","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "18", "div_pais" => "Brazil", "div_moneda" => "Reais", "div_codigo" => "BRL", "div_simbolo" => "R$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "19", "div_pais" => "Britain [United Kingdom]", "div_moneda" => "Pounds", "div_codigo" => "GBP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "20", "div_pais" => "Brunei Darussalam", "div_moneda" => "Dollars", "div_codigo" => "BND", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "21", "div_pais" => "Cambodia", "div_moneda" => "Riels", "div_codigo" => "KHR", "div_simbolo" => "៛","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "22", "div_pais" => "Canada", "div_moneda" => "Dollars", "div_codigo" => "CAD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "23", "div_pais" => "Cayman Islands", "div_moneda" => "Dollars", "div_codigo" => "KYD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "24", "div_pais" => "Chile", "div_moneda" => "Pesos", "div_codigo" => "CLP", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "25", "div_pais" => "China", "div_moneda" => "Yuan Renminbi", "div_codigo" => "CNY", "div_simbolo" => "¥","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "26", "div_pais" => "Colombia", "div_moneda" => "Pesos", "div_codigo" => "COP", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "27", "div_pais" => "Costa Rica", "div_moneda" => "Colón", "div_codigo" => "CRC", "div_simbolo" => "₡","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "28", "div_pais" => "Croatia", "div_moneda" => "Kuna", "div_codigo" => "HRK", "div_simbolo" => "kn","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "29", "div_pais" => "Cuba", "div_moneda" => "Pesos", "div_codigo" => "CUP", "div_simbolo" => "₱","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "30", "div_pais" => "Cyprus", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "31", "div_pais" => "Czech Republic", "div_moneda" => "Koruny", "div_codigo" => "CZK", "div_simbolo" => "Kč","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "32", "div_pais" => "Denmark", "div_moneda" => "Kroner", "div_codigo" => "DKK", "div_simbolo" => "kr","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "33", "div_pais" => "Dominican Republic", "div_moneda" => "Pesos", "div_codigo" => "DOP ", "div_simbolo" => "RD$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "34", "div_pais" => "East Caribbean", "div_moneda" => "Dollars", "div_codigo" => "XCD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "35", "div_pais" => "Egypt", "div_moneda" => "Pounds", "div_codigo" => "EGP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "36", "div_pais" => "El Salvador", "div_moneda" => "Colones", "div_codigo" => "SVC", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "37", "div_pais" => "England [United Kingdom]", "div_moneda" => "Pounds", "div_codigo" => "GBP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "38", "div_pais" => "Euro", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "39", "div_pais" => "Falkland Islands", "div_moneda" => "Pounds", "div_codigo" => "FKP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "40", "div_pais" => "Fiji", "div_moneda" => "Dollars", "div_codigo" => "FJD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "41", "div_pais" => "France", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "42", "div_pais" => "Ghana", "div_moneda" => "Cedis", "div_codigo" => "GHC", "div_simbolo" => "¢","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "43", "div_pais" => "Gibraltar", "div_moneda" => "Pounds", "div_codigo" => "GIP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "44", "div_pais" => "Greece", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "45", "div_pais" => "Guatemala", "div_moneda" => "Quetzales", "div_codigo" => "GTQ", "div_simbolo" => "Q","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "46", "div_pais" => "Guernsey", "div_moneda" => "Pounds", "div_codigo" => "GGP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "47", "div_pais" => "Guyana", "div_moneda" => "Dollars", "div_codigo" => "GYD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "48", "div_pais" => "Holland [Netherlands]", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "49", "div_pais" => "Honduras", "div_moneda" => "Lempiras", "div_codigo" => "HNL", "div_simbolo" => "L","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "50", "div_pais" => "Hong Kong", "div_moneda" => "Dollars", "div_codigo" => "HKD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "51", "div_pais" => "Hungary", "div_moneda" => "Forint", "div_codigo" => "HUF", "div_simbolo" => "Ft","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "52", "div_pais" => "Iceland", "div_moneda" => "Kronur", "div_codigo" => "ISK", "div_simbolo" => "kr","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "53", "div_pais" => "India", "div_moneda" => "Rupees", "div_codigo" => "INR", "div_simbolo" => "₹","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "54", "div_pais" => "Indonesia", "div_moneda" => "Rupiahs", "div_codigo" => "IDR", "div_simbolo" => "Rp","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "55", "div_pais" => "Iran", "div_moneda" => "Rials", "div_codigo" => "IRR", "div_simbolo" => "﷼","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "56", "div_pais" => "Ireland", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "57", "div_pais" => "Isle of Man", "div_moneda" => "Pounds", "div_codigo" => "IMP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "58", "div_pais" => "Israel", "div_moneda" => "New Shekels", "div_codigo" => "ILS", "div_simbolo" => "₪","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "59", "div_pais" => "Italy", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "60", "div_pais" => "Jamaica", "div_moneda" => "Dollars", "div_codigo" => "JMD", "div_simbolo" => "J$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "61", "div_pais" => "Japan", "div_moneda" => "Yen", "div_codigo" => "JPY", "div_simbolo" => "¥","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "62", "div_pais" => "Jersey", "div_moneda" => "Pounds", "div_codigo" => "JEP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "63", "div_pais" => "Kazakhstan", "div_moneda" => "Tenge", "div_codigo" => "KZT", "div_simbolo" => "лв","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "64", "div_pais" => "Korea [North]", "div_moneda" => "Won", "div_codigo" => "KPW", "div_simbolo" => "₩","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "65", "div_pais" => "Korea [South]", "div_moneda" => "Won", "div_codigo" => "KRW", "div_simbolo" => "₩","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "66", "div_pais" => "Kyrgyzstan", "div_moneda" => "Soms", "div_codigo" => "KGS", "div_simbolo" => "лв","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "67", "div_pais" => "Laos", "div_moneda" => "Kips", "div_codigo" => "LAK", "div_simbolo" => "₭","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "68", "div_pais" => "Latvia", "div_moneda" => "Lati", "div_codigo" => "LVL", "div_simbolo" => "Ls","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "69", "div_pais" => "Lebanon", "div_moneda" => "Pounds", "div_codigo" => "LBP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "70", "div_pais" => "Liberia", "div_moneda" => "Dollars", "div_codigo" => "LRD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "71", "div_pais" => "Liechtenstein", "div_moneda" => "Switzerland Francs", "div_codigo" => "CHF", "div_simbolo" => "CHF","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "72", "div_pais" => "Lithuania", "div_moneda" => "Litai", "div_codigo" => "LTL", "div_simbolo" => "Lt","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "73", "div_pais" => "Luxembourg", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "74", "div_pais" => "Macedonia", "div_moneda" => "Denars", "div_codigo" => "MKD", "div_simbolo" => "ден","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "75", "div_pais" => "Malaysia", "div_moneda" => "Ringgits", "div_codigo" => "MYR", "div_simbolo" => "RM","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "76", "div_pais" => "Malta", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "77", "div_pais" => "Mauritius", "div_moneda" => "Rupees", "div_codigo" => "MUR", "div_simbolo" => "₨","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "78", "div_pais" => "Mexico", "div_moneda" => "Pesos", "div_codigo" => "MX", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "79", "div_pais" => "Mongolia", "div_moneda" => "Tugriks", "div_codigo" => "MNT", "div_simbolo" => "₮","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "80", "div_pais" => "Mozambique", "div_moneda" => "Meticais", "div_codigo" => "MZ", "div_simbolo" => "MT","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "81", "div_pais" => "Namibia", "div_moneda" => "Dollars", "div_codigo" => "NAD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "82", "div_pais" => "Nepal", "div_moneda" => "Rupees", "div_codigo" => "NPR", "div_simbolo" => "₨","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "83", "div_pais" => "Netherlands Antilles", "div_moneda" => "Guilders", "div_codigo" => "ANG", "div_simbolo" => "ƒ","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "84", "div_pais" => "Netherlands", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "85", "div_pais" => "New Zealand", "div_moneda" => "Dollars", "div_codigo" => "NZD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "86", "div_pais" => "Nicaragua", "div_moneda" => "Cordobas", "div_codigo" => "NIO", "div_simbolo" => "C$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "87", "div_pais" => "Nigeria", "div_moneda" => "Nairas", "div_codigo" => "NG", "div_simbolo" => "₦","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "88", "div_pais" => "North Korea", "div_moneda" => "Won", "div_codigo" => "KPW", "div_simbolo" => "₩","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "89", "div_pais" => "Norway", "div_moneda" => "Krone", "div_codigo" => "NOK", "div_simbolo" => "kr","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "90", "div_pais" => "Oman", "div_moneda" => "Rials", "div_codigo" => "OMR", "div_simbolo" => "﷼","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "91", "div_pais" => "Pakistan", "div_moneda" => "Rupees", "div_codigo" => "PKR", "div_simbolo" => "₨","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "92", "div_pais" => "Panama", "div_moneda" => "Balboa", "div_codigo" => "PAB", "div_simbolo" => "B/.","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "93", "div_pais" => "Paraguay", "div_moneda" => "Guarani", "div_codigo" => "PYG", "div_simbolo" => "Gs","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "94", "div_pais" => "Peru", "div_moneda" => "Nuevos Soles", "div_codigo" => "PE", "div_simbolo" => "S/.","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "95", "div_pais" => "Philippines", "div_moneda" => "Pesos", "div_codigo" => "PHP", "div_simbolo" => "Php","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "96", "div_pais" => "Poland", "div_moneda" => "Zlotych", "div_codigo" => "PL", "div_simbolo" => "zł","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "97", "div_pais" => "Qatar", "div_moneda" => "Rials", "div_codigo" => "QAR", "div_simbolo" => "﷼","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "98", "div_pais" => "Romania", "div_moneda" => "New Lei", "div_codigo" => "RO", "div_simbolo" => "lei","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "99", "div_pais" => "Russia", "div_moneda" => "Rubles", "div_codigo" => "RUB", "div_simbolo" => "руб","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "100", "div_pais" => "Saint Helena", "div_moneda" => "Pounds", "div_codigo" => "SHP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "101", "div_pais" => "Saudi Arabia", "div_moneda" => "Riyals", "div_codigo" => "SAR", "div_simbolo" => "﷼","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "102", "div_pais" => "Serbia", "div_moneda" => "Dinars", "div_codigo" => "RSD", "div_simbolo" => "Дин.","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "103", "div_pais" => "Seychelles", "div_moneda" => "Rupees", "div_codigo" => "SCR", "div_simbolo" => "₨","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "104", "div_pais" => "Singapore", "div_moneda" => "Dollars", "div_codigo" => "SGD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "105", "div_pais" => "Slovenia", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "106", "div_pais" => "Solomon Islands", "div_moneda" => "Dollars", "div_codigo" => "SBD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "107", "div_pais" => "Somalia", "div_moneda" => "Shillings", "div_codigo" => "SOS", "div_simbolo" => "S","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "108", "div_pais" => "South Africa", "div_moneda" => "Rand", "div_codigo" => "ZAR", "div_simbolo" => "R","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "109", "div_pais" => "South Korea", "div_moneda" => "Won", "div_codigo" => "KRW", "div_simbolo" => "₩","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "110", "div_pais" => "Spain", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "111", "div_pais" => "Sri Lanka", "div_moneda" => "Rupees", "div_codigo" => "LKR", "div_simbolo" => "₨","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "112", "div_pais" => "Sweden", "div_moneda" => "Kronor", "div_codigo" => "SEK", "div_simbolo" => "kr","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "113", "div_pais" => "Switzerland", "div_moneda" => "Francs", "div_codigo" => "CHF", "div_simbolo" => "CHF","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "114", "div_pais" => "Suriname", "div_moneda" => "Dollars", "div_codigo" => "SRD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "115", "div_pais" => "Syria", "div_moneda" => "Pounds", "div_codigo" => "SYP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "116", "div_pais" => "Taiwan", "div_moneda" => "New Dollars", "div_codigo" => "TWD", "div_simbolo" => "NT$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "117", "div_pais" => "Thailand", "div_moneda" => "Baht", "div_codigo" => "THB", "div_simbolo" => "฿","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "118", "div_pais" => "Trinidad and Tobago", "div_moneda" => "Dollars", "div_codigo" => "TTD", "div_simbolo" => "TT$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "119", "div_pais" => "Turkey", "div_moneda" => "Lira", "div_codigo" => "TRY", "div_simbolo" => "TL","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "120", "div_pais" => "Turkey", "div_moneda" => "Liras", "div_codigo" => "TRL", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "121", "div_pais" => "Tuvalu", "div_moneda" => "Dollars", "div_codigo" => "TVD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "122", "div_pais" => "Ukraine", "div_moneda" => "Hryvnia", "div_codigo" => "UAH", "div_simbolo" => "₴","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "123", "div_pais" => "United Kingdom", "div_moneda" => "Pounds", "div_codigo" => "GBP", "div_simbolo" => "£","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "124", "div_pais" => "United States of America", "div_moneda" => "Dollars", "div_codigo" => "USD", "div_simbolo" => '$',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "125", "div_pais" => "Uruguay", "div_moneda" => "Pesos", "div_codigo" => "UYU", "div_simbolo" => '$U',"div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "126", "div_pais" => "Uzbekistan", "div_moneda" => "Sums", "div_codigo" => "UZS", "div_simbolo" => "лв","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "127", "div_pais" => "Vatican City", "div_moneda" => "Euro", "div_codigo" => "EUR", "div_simbolo" => "€","div_separador_miles" => ".", "div_separador_decimal" => "," ],
            [ "id" => "128", "div_pais" => "Venezuela", "div_moneda" => "Bolivares Fuertes", "div_codigo" => "VEF", "div_simbolo" => "Bs","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "129", "div_pais" => "Vietnam", "div_moneda" => "Dong", "div_codigo" => "VND", "div_simbolo" => "₫","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "130", "div_pais" => "Yemen", "div_moneda" => "Rials", "div_codigo" => "YER", "div_simbolo" => "﷼","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "131", "div_pais" => "Zimbabwe", "div_moneda" => "Zimbabwe Dollars", "div_codigo" => "ZWD", "div_simbolo" => "Z$","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "132", "div_pais" => "Iraq", "div_moneda" => "Iraqi dinar", "div_codigo" => "IQD", "div_simbolo" => "د.ع","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "id" => "133", "div_pais" => "Kenya", "div_moneda" => "Kenyan shilling", "div_codigo" => "KES", "div_simbolo" => "KSh","div_separador_miles" => ",", "div_separador_decimal" => "." ],
            ["id" => "134", "div_pais" => "Bangladesh", "div_moneda" => "Taka", "div_codigo" => "BDT", "div_simbolo" => "৳", "div_separador_miles" => ",", "div_separador_decimal" => "." ],
            ["div_pais" => "Algerie", "div_moneda" => "Algerian dinar", "div_codigo" => "DZD", "div_simbolo" => "د.ج", "div_separador_miles" => " ", "div_separador_decimal" => "." ],
            [ "div_pais" => "United Arab Emirates", "div_moneda" => "United Arab Emirates dirham", "div_codigo" => "AED", "div_simbolo" => "د.إ", "div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "div_pais" => "Uganda", "div_moneda" => "Uganda shillings", "div_codigo" => "UGX", "div_simbolo" => "USh", "div_separador_miles" => ",", "div_separador_decimal" => "." ],
            [ "div_pais" => "Tanzania", "div_moneda" => "Tanzanian shilling", "div_codigo" => "TZS", "div_simbolo" => "TSh", "div_separador_miles" => ",", "div_separador_decimal" => "." ]
      
    );
    public function run()
    {
        DB::table('divisa')->truncate();

        $this->saveOrUpdate('divisa', self::$_DIVISA_FORMAT_DATA);
    }
}