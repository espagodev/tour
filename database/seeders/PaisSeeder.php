<?php

namespace Database\Seeders;

use App\Helper\SeederHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaisSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_DATE_PAIS = array(
 [ 'id' => '1',  'pai_nombre' => 'Afganistán', 'pai_gentilicio' => 'AFGANA','pai_iso' => 'AFG'],
 [ 'id' => '2',  'pai_nombre' =>  'Albania', 'pai_gentilicio' => 'ALBANESA', 'pai_iso' => 'ALB'],
 [ 'id' => '3',  'pai_nombre' => 'Alemania', 'pai_gentilicio' => 'ALEMANA', 'pai_iso' => 'DEU' ],
 [ 'id' => '4',  'pai_nombre' => 'Andorra', 'pai_gentilicio' => 'ANDORRANA', 'pai_iso' => 'AND' ],
 [ 'id' => '5',  'pai_nombre' => 'Angola', 'pai_gentilicio' => 'ANGOLEÑA', 'pai_iso' => 'AGO' ],
 [ 'id' => '6',  'pai_nombre' => 'AntiguayBarbuda', 'pai_gentilicio' => 'ANTIGUANA', 'pai_iso' => 'ATG' ],
 [ 'id' => '7',  'pai_nombre' => 'ArabiaSaudita', 'pai_gentilicio' => 'SAUDÍ', 'pai_iso' => 'SAU' ],
 [ 'id' => '8',  'pai_nombre' => 'Argelia', 'pai_gentilicio' => 'ARGELINA', 'pai_iso' => 'DZA' ],
 [ 'id' => '9',  'pai_nombre' => 'Argentina', 'pai_gentilicio' => 'ARGENTINA', 'pai_iso' => 'ARG' ],
 [ 'id' => '10',  'pai_nombre' => 'Armenia', 'pai_gentilicio' => 'ARMENIA', 'pai_iso' => 'ARM' ],
 [ 'id' => '11',  'pai_nombre' => 'Aruba', 'pai_gentilicio' => 'ARUBEÑA', 'pai_iso' => 'ABW' ],
 [ 'id' => '12',  'pai_nombre' => 'Australia', 'pai_gentilicio' => 'AUSTRALIANA', 'pai_iso' => 'AUS' ],
 [ 'id' => '13',  'pai_nombre' => 'Austria', 'pai_gentilicio' => 'AUSTRIACA', 'pai_iso' => 'AUT' ],
 [ 'id' => '14',  'pai_nombre' => 'Azerbaiyán', 'pai_gentilicio' => 'AZERBAIYANA', 'pai_iso' => 'AZE' ],
 [ 'id' => '15',  'pai_nombre' => 'Bahamas', 'pai_gentilicio' => 'BAHAMEÑA', 'pai_iso' => 'BHS'],
 [ 'id' => '16',  'pai_nombre' => 'Bangladés', 'pai_gentilicio' => 'BANGLADESÍ', 'pai_iso' => 'BGD'],
 [ 'id' => '17',  'pai_nombre' => 'Barbados', 'pai_gentilicio' => 'BARBADENSE', 'pai_iso' => 'BRB'],
 [ 'id' => '18',  'pai_nombre' => 'Baréin', 'pai_gentilicio' => 'BAREINÍ', 'pai_iso' => 'BHR'],
 [ 'id' => '19',  'pai_nombre' => 'Bélgica', 'pai_gentilicio' => 'BELGA', 'pai_iso' => 'BEL'],
 [ 'id' => '20',  'pai_nombre' => 'Belice', 'pai_gentilicio' => 'BELICEÑA', 'pai_iso' => 'BLZ'],
 [ 'id' => '21',  'pai_nombre' => 'Benín', 'pai_gentilicio' => 'BENINÉSA', 'pai_iso' => 'BEN'],
 [ 'id' => '22',  'pai_nombre' => 'Bielorrusia', 'pai_gentilicio' => 'BIELORRUSA', 'pai_iso' => 'BLR'],
 [ 'id' => '23',  'pai_nombre' => 'Birmania', 'pai_gentilicio' => 'BIRMANA', 'pai_iso' => 'MMR'],
 [ 'id' => '24',  'pai_nombre' => 'Bolivia', 'pai_gentilicio' => 'BOLIVIANA', 'pai_iso' => 'BOL'],
 [ 'id' => '25',  'pai_nombre' => 'BosniayHerzegovina', 'pai_gentilicio' => 'BOSNIA', 'pai_iso' => 'BIH'],
 [ 'id' => '26',  'pai_nombre' => 'Botsuana', 'pai_gentilicio' => 'BOTSUANA', 'pai_iso' => 'BWA'],
 [ 'id' => '27',  'pai_nombre' => 'Brasil', 'pai_gentilicio' => 'BRASILEÑA', 'pai_iso' => 'BRA'],
 [ 'id' => '28',  'pai_nombre' => 'Brunéi', 'pai_gentilicio' => 'BRUNEANA', 'pai_iso' => 'BRN'],
 [ 'id' => '29',  'pai_nombre' => 'Bulgaria', 'pai_gentilicio' => 'BÚLGARA', 'pai_iso' => 'BGR'],
 [ 'id' => '30',  'pai_nombre' => 'BurkinaFaso', 'pai_gentilicio' => 'BURKINÉS', 'pai_iso' => 'BFA'],
 [ 'id' => '31',  'pai_nombre' => 'Burundi', 'pai_gentilicio' => 'BURUNDÉSA', 'pai_iso' => 'BDI'],
 [ 'id' => '32',  'pai_nombre' => 'Bután', 'pai_gentilicio' => 'BUTANÉSA', 'pai_iso' => 'BTN'],
 [ 'id' => '33',  'pai_nombre' => 'CaboVerde', 'pai_gentilicio' => 'CABOVERDIANA', 'pai_iso' => 'CPV'],
 [ 'id' => '34',  'pai_nombre' => 'Camboya', 'pai_gentilicio' => 'CAMBOYANA', 'pai_iso' => 'KHM'],
 [ 'id' => '35',  'pai_nombre' => 'Camerún', 'pai_gentilicio' => 'CAMERUNESA', 'pai_iso' => 'CMR'],
 [ 'id' => '36',  'pai_nombre' => 'Canadá', 'pai_gentilicio' => 'CANADIENSE', 'pai_iso' => 'CAN'],
 [ 'id' => '37',  'pai_nombre' => 'Catar', 'pai_gentilicio' => 'CATARÍ', 'pai_iso' => 'QAT'],
 [ 'id' => '38',  'pai_nombre' => 'Chad', 'pai_gentilicio' => 'CHADIANA', 'pai_iso' => 'TCD'],
 [ 'id' => '39',  'pai_nombre' => 'Chile', 'pai_gentilicio' => 'CHILENA', 'pai_iso' => 'CHL'],
 [ 'id' => '40',  'pai_nombre' => 'China', 'pai_gentilicio' => 'CHINA', 'pai_iso' => 'CHN'],
 [ 'id' => '41',  'pai_nombre' => 'Chipre', 'pai_gentilicio' => 'CHIPRIOTA', 'pai_iso' => 'CYP'],
 [ 'id' => '42',  'pai_nombre' => 'CiudaddelVaticano', 'pai_gentilicio' => 'VATICANA', 'pai_iso' => 'VAT'],
 [ 'id' => '43',  'pai_nombre' => 'Colombia', 'pai_gentilicio' => 'COLOMBIANA', 'pai_iso' => 'COL'],
 [ 'id' => '44',  'pai_nombre' => 'Comoras', 'pai_gentilicio' => 'COMORENSE', 'pai_iso' => 'COM'],
 [ 'id' => '45',  'pai_nombre' => 'CoreadelNorte', 'pai_gentilicio' => 'NORCOREANA', 'pai_iso' => 'PRK'],
 [ 'id' => '46',  'pai_nombre' => 'CoreadelSur', 'pai_gentilicio' => 'SURCOREANA', 'pai_iso' => 'KOR'],
 [ 'id' => '47',  'pai_nombre' => 'CostadeMarfil', 'pai_gentilicio' => 'MARFILEÑA', 'pai_iso' => 'CIV'],
 [ 'id' => '48',  'pai_nombre' => 'CostaRica', 'pai_gentilicio' => 'COSTARRICENSE', 'pai_iso' => 'CRI'],
 [ 'id' => '49',  'pai_nombre' => 'Croacia', 'pai_gentilicio' => 'CROATA', 'pai_iso' => 'HRV'],
 [ 'id' => '50',  'pai_nombre' => 'Cuba', 'pai_gentilicio' => 'CUBANA', 'pai_iso' => 'CUB'],
 [ 'id' => '51',  'pai_nombre' => 'Dinamarca', 'pai_gentilicio' => 'DANÉSA', 'pai_iso' => 'DNK'],
 [ 'id' => '52',  'pai_nombre' => 'Dominica', 'pai_gentilicio' => 'DOMINIQUÉS', 'pai_iso' => 'DMA'],
 [ 'id' => '53',  'pai_nombre' => 'Ecuador', 'pai_gentilicio' => 'ECUATORIANA', 'pai_iso' => 'ECU'],
 [ 'id' => '54',  'pai_nombre' => 'Egipto', 'pai_gentilicio' => 'EGIPCIA', 'pai_iso' => 'EGY'],
 [ 'id' => '55',  'pai_nombre' => 'ElSalvador', 'pai_gentilicio' => 'SALVADOREÑA', 'pai_iso' => 'SLV'],
 [ 'id' => '56',  'pai_nombre' => 'EmiratosÁrabesUnidos', 'pai_gentilicio' => 'EMIRATÍ', 'pai_iso' => 'ARE'],
 [ 'id' => '57',  'pai_nombre' => 'Eritrea', 'pai_gentilicio' => 'ERITREA', 'pai_iso' => 'ERI'],
 [ 'id' => '58',  'pai_nombre' => 'Eslovaquia', 'pai_gentilicio' => 'ESLOVACA', 'pai_iso' => 'SVK'],
 [ 'id' => '59',  'pai_nombre' => 'Eslovenia', 'pai_gentilicio' => 'ESLOVENA', 'pai_iso' => 'SVN'],
 [ 'id' => '60',  'pai_nombre' => 'España', 'pai_gentilicio' => 'ESPAÑOLA', 'pai_iso' => 'ESP'],
 [ 'id' => '61',  'pai_nombre' => 'EstadosUnidos', 'pai_gentilicio' => 'ESTADOUNIDENSE', 'pai_iso' => 'USA'],
 [ 'id' => '62',  'pai_nombre' => 'Estonia', 'pai_gentilicio' => 'ESTONIA', 'pai_iso' => 'EST'],
 [ 'id' => '63',  'pai_nombre' => 'Etiopía', 'pai_gentilicio' => 'ETÍOPE', 'pai_iso' => 'ETH'],
 [ 'id' => '64',  'pai_nombre' => 'Filipinas', 'pai_gentilicio' => 'FILIPINA', 'pai_iso' => 'PHL'],
 [ 'id' => '65',  'pai_nombre' => 'Finlandia', 'pai_gentilicio' => 'FINLANDÉSA', 'pai_iso' => 'FIN'],
 [ 'id' => '66',  'pai_nombre' => 'Fiyi', 'pai_gentilicio' => 'FIYIANA', 'pai_iso' => 'FJI'],
 [ 'id' => '67',  'pai_nombre' => 'Francia', 'pai_gentilicio' => 'FRANCÉSA', 'pai_iso' => 'FRA'],
 [ 'id' => '68',  'pai_nombre' => 'Gabón', 'pai_gentilicio' => 'GABONÉSA', 'pai_iso' => 'GAB'],
 [ 'id' => '69',  'pai_nombre' => 'Gambia', 'pai_gentilicio' => 'GAMBIANA', 'pai_iso' => 'GMB'],
 [ 'id' => '70',  'pai_nombre' => 'Georgia', 'pai_gentilicio' => 'GEORGIANA', 'pai_iso' => 'GEO'],
 [ 'id' => '71',  'pai_nombre' => 'Gibraltar', 'pai_gentilicio' => 'GIBRALTAREÑA', 'pai_iso' => 'GIB'],
 [ 'id' => '72',  'pai_nombre' => 'Ghana', 'pai_gentilicio' => 'GHANÉSA', 'pai_iso' => 'GHA'],
 [ 'id' => '73',  'pai_nombre' => 'Granada', 'pai_gentilicio' => 'GRANADINA', 'pai_iso' => 'GRD'],
 [ 'id' => '74',  'pai_nombre' => 'Grecia', 'pai_gentilicio' => 'GRIEGA', 'pai_iso' => 'GRC'],
 [ 'id' => '75',  'pai_nombre' => 'Groenlandia', 'pai_gentilicio' => 'GROENLANDÉSA', 'pai_iso' => 'GRL'],
 [ 'id' => '76',  'pai_nombre' => 'Guatemala', 'pai_gentilicio' => 'GUATEMALTECA', 'pai_iso' => 'GTM'],
 [ 'id' => '77',  'pai_nombre' => 'Guineaecuatorial', 'pai_gentilicio' => 'ECUATOGUINEANA', 'pai_iso' => 'GNQ'],
 [ 'id' => '78',  'pai_nombre' => 'Guinea', 'pai_gentilicio' => 'GUINEANA', 'pai_iso' => 'GIN'],
 [ 'id' => '79',  'pai_nombre' => 'Guinea-Bisáu', 'pai_gentilicio' => 'GUINEANA', 'pai_iso' => 'GNB'],
 [ 'id' => '80',  'pai_nombre' => 'Guyana', 'pai_gentilicio' => 'GUYANESA', 'pai_iso' => 'GUY'],
 [ 'id' => '81',  'pai_nombre' => 'Haití', 'pai_gentilicio' => 'HAITIANA', 'pai_iso' => 'HTI'],
 [ 'id' => '82',  'pai_nombre' => 'Honduras', 'pai_gentilicio' => 'HONDUREÑA', 'pai_iso' => 'HND'],
 [ 'id' => '83',  'pai_nombre' => 'Hungría', 'pai_gentilicio' => 'HÚNGARA', 'pai_iso' => 'HUN'],
 [ 'id' => '84',  'pai_nombre' => 'India', 'pai_gentilicio' => 'HINDÚ', 'pai_iso' => 'IND'],
 [ 'id' => '85',  'pai_nombre' => 'Indonesia', 'pai_gentilicio' => 'INDONESIA', 'pai_iso' => 'IDN'],
 [ 'id' => '86',  'pai_nombre' => 'Irak', 'pai_gentilicio' =>  'IRAQUÍ','pai_iso' => 'IRQ'],
 [ 'id' => '87',  'pai_nombre' => 'Irán', 'pai_gentilicio' => 'IRANÍ', 'pai_iso' => 'IRN'],
 [ 'id' => '88',  'pai_nombre' => 'Irlanda', 'pai_gentilicio' => 'IRLANDÉSA', 'pai_iso' => 'IRL'],
 [ 'id' => '89',  'pai_nombre' => 'Islandia', 'pai_gentilicio' => 'ISLANDÉSA', 'pai_iso' => 'ISL'],
 [ 'id' => '90',  'pai_nombre' => 'IslasCook', 'pai_gentilicio' => 'COOKIANA', 'pai_iso' => 'COK'],
 [ 'id' => '91',  'pai_nombre' => 'IslasMarshall', 'pai_gentilicio' => 'MARSHALÉSA', 'pai_iso' => 'MHL'],
 [ 'id' => '92',  'pai_nombre' => 'IslasSalomón', 'pai_gentilicio' => 'SALOMONENSE', 'pai_iso' => 'SLB'],
 [ 'id' => '93',  'pai_nombre' => 'Israel', 'pai_gentilicio' => 'ISRAELÍ', 'pai_iso' => 'ISR'],
 [ 'id' => '94',  'pai_nombre' => 'Italia', 'pai_gentilicio' => 'ITALIANA', 'pai_iso' => 'ITA'],
 [ 'id' => '95',  'pai_nombre' => 'Jamaica', 'pai_gentilicio' => 'JAMAIQUINA', 'pai_iso' => 'JAM'],
 [ 'id' => '96',  'pai_nombre' => 'Japón', 'pai_gentilicio' => 'JAPONÉSA', 'pai_iso' => 'JPN'],
 [ 'id' => '97',  'pai_nombre' => 'Jordania', 'pai_gentilicio' => 'JORDANA', 'pai_iso' => 'JOR'],
 [ 'id' => '98',  'pai_nombre' => 'Kazajistán', 'pai_gentilicio' => 'KAZAJA', 'pai_iso' => 'KAZ'],
 [ 'id' => '99',  'pai_nombre' => 'Kenia', 'pai_gentilicio' => 'KENIATA', 'pai_iso' => 'KEN'],
 [ 'id' => '100',  'pai_nombre' => 'Kirguistán', 'pai_gentilicio' => 'KIRGUISA', 'pai_iso' => 'KGZ'],
 [ 'id' => '101',  'pai_nombre' => 'Kiribati', 'pai_gentilicio' => 'KIRIBATIANA', 'pai_iso' => 'KIR'],
 [ 'id' => '102',  'pai_nombre' => 'Kuwait', 'pai_gentilicio' => 'KUWAITÍ', 'pai_iso' => 'KWT'],
 [ 'id' => '103',  'pai_nombre' => 'Laos', 'pai_gentilicio' => 'LAOSIANA', 'pai_iso' => 'LAO'],
 [ 'id' => '104',  'pai_nombre' => 'Lesoto', 'pai_gentilicio' => 'LESOTENSE', 'pai_iso' => 'LSO'],
 [ 'id' => '105',  'pai_nombre' => 'Letonia', 'pai_gentilicio' => 'LETÓNA', 'pai_iso' => 'LVA'],
 [ 'id' => '106',  'pai_nombre' => 'Líbano', 'pai_gentilicio' => 'LIBANÉSA', 'pai_iso' => 'LBN'],
 [ 'id' => '107',  'pai_nombre' => 'Liberia', 'pai_gentilicio' => 'LIBERIANA', 'pai_iso' => 'LBR'],
 [ 'id' => '108',  'pai_nombre' => 'Libia', 'pai_gentilicio' => 'LIBIA', 'pai_iso' => 'LBY'],
 [ 'id' => '109',  'pai_nombre' => 'Liechtenstein', 'pai_gentilicio' => 'LIECHTENSTEINIANA', 'pai_iso' => 'LIE'],
 [ 'id' => '110',  'pai_nombre' => 'Lituania', 'pai_gentilicio' => 'LITUANA', 'pai_iso' => 'LTU'],
 [ 'id' => '111',  'pai_nombre' => 'Luxemburgo', 'pai_gentilicio' => 'LUXEMBURGUÉSA', 'pai_iso' => 'LUX'],
 [ 'id' => '112',  'pai_nombre' => 'Madagascar', 'pai_gentilicio' => 'MALGACHE', 'pai_iso' => 'MDG'],
 [ 'id' => '113',  'pai_nombre' => 'Malasia', 'pai_gentilicio' => 'MALASIA', 'pai_iso' => 'MYS'],
 [ 'id' => '114',  'pai_nombre' => 'Malaui', 'pai_gentilicio' => 'MALAUÍ', 'pai_iso' => 'MWI'],
 [ 'id' => '115',  'pai_nombre' => 'Maldivas', 'pai_gentilicio' => 'MALDIVA', 'pai_iso' => 'MDV'],
 [ 'id' => '116',  'pai_nombre' => 'Malí', 'pai_gentilicio' => 'MALIENSE', 'pai_iso' => 'MLI'],
 [ 'id' => '117',  'pai_nombre' => 'Malta', 'pai_gentilicio' => 'MALTÉSA', 'pai_iso' => 'MLT'],
 [ 'id' => '118',  'pai_nombre' => 'Marruecos', 'pai_gentilicio' => 'MARROQUÍ', 'pai_iso' => 'MAR'],
 [ 'id' => '119',  'pai_nombre' => 'Martinica', 'pai_gentilicio' => 'MARTINIQUÉS', 'pai_iso' => 'MTQ'],
 [ 'id' => '120',  'pai_nombre' => 'Mauricio', 'pai_gentilicio' => 'MAURICIANA', 'pai_iso' => 'MUS'],
 [ 'id' => '121',  'pai_nombre' => 'Mauritania', 'pai_gentilicio' => 'MAURITANA', 'pai_iso' => 'MRT'],
 [ 'id' => '122',  'pai_nombre' => 'México', 'pai_gentilicio' => 'MEXICANA', 'pai_iso' => 'MEX'],
 [ 'id' => '123',  'pai_nombre' => 'Micronesia', 'pai_gentilicio' => 'MICRONESIA', 'pai_iso' => 'FSM'],
 [ 'id' => '124',  'pai_nombre' => 'Moldavia', 'pai_gentilicio' => 'MOLDAVA', 'pai_iso' => 'MDA'],
 [ 'id' => '125',  'pai_nombre' => 'Mónaco', 'pai_gentilicio' => 'MONEGASCA', 'pai_iso' => 'MCO'],
 [ 'id' => '126',  'pai_nombre' => 'Mongolia', 'pai_gentilicio' => 'MONGOLA', 'pai_iso' => 'MNG'],
 [ 'id' => '127',  'pai_nombre' => 'Montenegro', 'pai_gentilicio' => 'MONTENEGRINA', 'pai_iso' => 'MNE'],
 [ 'id' => '128',  'pai_nombre' => 'Mozambique', 'pai_gentilicio' => 'MOZAMBIQUEÑA', 'pai_iso' => 'MOZ'],
 [ 'id' => '129',  'pai_nombre' => 'Namibia', 'pai_gentilicio' => 'NAMIBIA', 'pai_iso' => 'NAM'],
 [ 'id' => '130',  'pai_nombre' => 'Nauru', 'pai_gentilicio' => 'NAURUANA', 'pai_iso' => 'NRU'],
 [ 'id' => '131',  'pai_nombre' => 'Nepal', 'pai_gentilicio' => 'NEPALÍ', 'pai_iso' => 'NPL'],
 [ 'id' => '132',  'pai_nombre' => 'Nicaragua', 'pai_gentilicio' => 'NICARAGÜENSE', 'pai_iso' => 'NIC'],
 [ 'id' => '133',  'pai_nombre' => 'Níger', 'pai_gentilicio' => 'NIGERINA', 'pai_iso' => 'NER'],
 [ 'id' => '134',  'pai_nombre' => 'Nigeria', 'pai_gentilicio' => 'NIGERIANA', 'pai_iso' => 'NGA'],
 [ 'id' => '135',  'pai_nombre' => 'Noruega', 'pai_gentilicio' => 'NORUEGA', 'pai_iso' => 'NOR'],
 [ 'id' => '136',  'pai_nombre' => 'NuevaZelanda', 'pai_gentilicio' => 'NEOZELANDÉSA', 'pai_iso' => 'NZL'],
 [ 'id' => '137',  'pai_nombre' => 'Omán', 'pai_gentilicio' => 'OMANÍ', 'pai_iso' => 'OMN'],
 [ 'id' => '138',  'pai_nombre' => 'PaísesBajos', 'pai_gentilicio' => 'NEERLANDÉSA', 'pai_iso' => 'NLD'],
 [ 'id' => '139',  'pai_nombre' => 'Pakistán', 'pai_gentilicio' => 'PAKISTANÍ', 'pai_iso' => 'PAK'],
 [ 'id' => '140',  'pai_nombre' => 'Palaos', 'pai_gentilicio' => 'PALAUANA', 'pai_iso' => 'PLW'],
 [ 'id' => '141',  'pai_nombre' => 'Palestina', 'pai_gentilicio' => 'PALESTINA', 'pai_iso' => 'PSE'],
 [ 'id' => '142',  'pai_nombre' => 'Panamá', 'pai_gentilicio' => 'PANAMEÑA', 'pai_iso' => 'PAN'],
 [ 'id' => '143',  'pai_nombre' => 'PapúaNuevaGuinea', 'pai_gentilicio' => 'PAPÚ', 'pai_iso' => 'PNG'],
 [ 'id' => '144',  'pai_nombre' => 'Paraguay', 'pai_gentilicio' => 'PARAGUAYA', 'pai_iso' => 'PRY'],
 [ 'id' => '145',  'pai_nombre' => 'Perú', 'pai_gentilicio' => 'PERUANA', 'pai_iso' => 'PER'],
 [ 'id' => '146',  'pai_nombre' => 'Polonia', 'pai_gentilicio' => 'POLACA', 'pai_iso' => 'POL'],
 [ 'id' => '147',  'pai_nombre' => 'Portugal', 'pai_gentilicio' => 'PORTUGUÉSA', 'pai_iso' => 'PRT'],
 [ 'id' => '148',  'pai_nombre' => 'PuertoRico', 'pai_gentilicio' => 'PUERTORRIQUEÑA', 'pai_iso' => 'PRI'],
 [ 'id' => '149',  'pai_nombre' => 'ReinoUnido', 'pai_gentilicio' => 'BRITÁNICA', 'pai_iso' => 'GBR'],
 [ 'id' => '150',  'pai_nombre' => 'RepúblicaCentroafricana', 'pai_gentilicio' => 'CENTROAFRICANA', 'pai_iso' => 'CAF'],
 [ 'id' => '151',  'pai_nombre' => 'RepúblicaCheca', 'pai_gentilicio' => 'CHECA', 'pai_iso' => 'CZE'],
 [ 'id' => '152',  'pai_nombre' => 'RepúblicadeMacedonia', 'pai_gentilicio' => 'MACEDONIA', 'pai_iso' => 'MKD'],
 [ 'id' => '153',  'pai_nombre' => 'RepúblicadelCongo', 'pai_gentilicio' => 'CONGOLEÑA', 'pai_iso' => 'COG'],
 [ 'id' => '154',  'pai_nombre' => 'RepúblicaDemocráticadelCongo', 'pai_gentilicio' => 'CONGOLEÑA', 'pai_iso' => 'COD'],
 [ 'id' => '155',  'pai_nombre' => 'RepúblicaDominicana', 'pai_gentilicio' => 'DOMINICANA', 'pai_iso' => 'DOM'],
 [ 'id' => '156',  'pai_nombre' => 'RepúblicaSudafricana', 'pai_gentilicio' => 'SUDAFRICANA', 'pai_iso' => 'ZAF'],
 [ 'id' => '157',  'pai_nombre' => 'Ruanda', 'pai_gentilicio' => 'RUANDÉSA', 'pai_iso' => 'RWA'],
 [ 'id' => '158',  'pai_nombre' => 'Rumanía', 'pai_gentilicio' => 'RUMANA', 'pai_iso' => 'ROU'],
 [ 'id' => '159',  'pai_nombre' => 'Rusia', 'pai_gentilicio' => 'RUSA', 'pai_iso' => 'RUS'],
 [ 'id' => '160',  'pai_nombre' => 'Samoa', 'pai_gentilicio' => 'SAMOANA', 'pai_iso' => 'WSM'],
 [ 'id' => '161',  'pai_nombre' => 'SanCristóbalyNieves', 'pai_gentilicio' => 'CRISTOBALEÑA', 'pai_iso' => 'KNA'],
 [ 'id' => '162',  'pai_nombre' => 'SanMarino', 'pai_gentilicio' => 'SANMARINENSE', 'pai_iso' => 'SMR'],
 [ 'id' => '163',  'pai_nombre' => 'SanVicenteylasGranadinas', 'pai_gentilicio' => 'SANVICENTINA', 'pai_iso' => 'VCT'],
 [ 'id' => '164',  'pai_nombre' => 'SantaLucía', 'pai_gentilicio' => 'SANTALUCENSE', 'pai_iso' => 'LCA'],
 [ 'id' => '165',  'pai_nombre' => 'SantoToméyPríncipe', 'pai_gentilicio' => 'SANTOTOMENSE', 'pai_iso' => 'STP'],
 [ 'id' => '166',  'pai_nombre' => 'Senegal', 'pai_gentilicio' => 'SENEGALÉSA', 'pai_iso' => 'SEN'],
 [ 'id' => '167',  'pai_nombre' => 'Serbia', 'pai_gentilicio' => 'SERBIA', 'pai_iso' => 'SRB'],
 [ 'id' => '168',  'pai_nombre' => 'Seychelles', 'pai_gentilicio' => 'SEYCHELLENSE', 'pai_iso' => 'SYC'],
 [ 'id' => '169',  'pai_nombre' => 'SierraLeona', 'pai_gentilicio' => 'SIERRALEONÉSA','pai_iso' => 'SLE'],
 [ 'id' => '170',  'pai_nombre' => 'Singapur', 'pai_gentilicio' => 'SINGAPURENSE','pai_iso' => 'SGP'],
 [ 'id' => '171',  'pai_nombre' => 'Siria', 'pai_gentilicio' => 'SIRIA','pai_iso' => 'SYR'],
 [ 'id' => '172',  'pai_nombre' => 'Somalia', 'pai_gentilicio' => 'SOMALÍ','pai_iso' => 'SOM'],
 [ 'id' => '173',  'pai_nombre' => 'SriLanka', 'pai_gentilicio' => 'CEILANÉSA','pai_iso' => 'LKA'],
 [ 'id' => '174',  'pai_nombre' => 'Suazilandia', 'pai_gentilicio' => 'SUAZI','pai_iso' => 'SWZ'],
 [ 'id' => '175',  'pai_nombre' => 'SudándelSur', 'pai_gentilicio' => 'SURSUDANÉSA','pai_iso' => 'SSD'],
 [ 'id' => '176',  'pai_nombre' => 'Sudán', 'pai_gentilicio' => 'SUDANÉSA','pai_iso' => 'SDN'],
 [ 'id' => '177',  'pai_nombre' => 'Suecia', 'pai_gentilicio' => 'SUECA','pai_iso' => 'SWE'],
 [ 'id' => '178',  'pai_nombre' => 'Suiza', 'pai_gentilicio' => 'SUIZA','pai_iso' => 'CHE'],
 [ 'id' => '179',  'pai_nombre' => 'Surinam', 'pai_gentilicio' => 'SURINAMESA','pai_iso' => 'SUR'],
 [ 'id' => '180',  'pai_nombre' => 'Tailandia', 'pai_gentilicio' => 'TAILANDÉSA','pai_iso' => 'THA'],
 [ 'id' => '181',  'pai_nombre' => 'Tanzania', 'pai_gentilicio' => 'TANZANA','pai_iso' => 'TZA'],
 [ 'id' => '182',  'pai_nombre' => 'Tayikistán', 'pai_gentilicio' => 'TAYIKA','pai_iso' => 'TJK'],
 [ 'id' => '183',  'pai_nombre' => 'TimorOriental', 'pai_gentilicio' => 'TIMORENSE','pai_iso' => 'TLS'],
 [ 'id' => '184',  'pai_nombre' => 'Togo', 'pai_gentilicio' => 'TOGOLÉSA','pai_iso' => 'TGO'],
 [ 'id' => '185',  'pai_nombre' => 'Tonga', 'pai_gentilicio' => 'TONGANA','pai_iso' => 'TON'],
 [ 'id' => '186',  'pai_nombre' => 'TrinidadyTobago', 'pai_gentilicio' => 'TRINITENSE','pai_iso' => 'TTO'],
 [ 'id' => '187',  'pai_nombre' => 'Túnez', 'pai_gentilicio' => 'TUNECINA','pai_iso' => 'TUN'],
 [ 'id' => '188',  'pai_nombre' => 'Turkmenistán', 'pai_gentilicio' => 'TURCOMANA','pai_iso' => 'TKM'],
 [ 'id' => '189',  'pai_nombre' => 'Turquía', 'pai_gentilicio' => 'TURCA','pai_iso' => 'TUR'],
 [ 'id' => '190',  'pai_nombre' => 'Tuvalu', 'pai_gentilicio' => 'TUVALUANA', 'pai_iso' => 'TUV'],
 [ 'id' => '191',  'pai_nombre' => 'Ucrania', 'pai_gentilicio' => 'UCRANIANA', 'pai_iso' => 'UKR'],
 [ 'id' => '192',  'pai_nombre' => 'Uganda', 'pai_gentilicio' => 'UGANDÉSA', 'pai_iso' =>  'UGA'],
 [ 'id' => '193',  'pai_nombre' => 'Uruguay', 'pai_gentilicio' => 'URUGUAYA', 'pai_iso' => 'URY'],
 [ 'id' => '194',  'pai_nombre' => 'Uzbekistán', 'pai_gentilicio' => 'UZBEKA', 'pai_iso' => 'UZB'],
 [ 'id' => '195',  'pai_nombre' => 'Vanuatu', 'pai_gentilicio' => 'VANUATUENSE', 'pai_iso' => 'VUT'],
 [ 'id' => '196',  'pai_nombre' => 'Venezuela', 'pai_gentilicio' => 'VENEZOLANA', 'pai_iso' => 'VEN'],
 [ 'id' => '197',  'pai_nombre' => 'Vietnam', 'pai_gentilicio' => 'VIETNAMITA', 'pai_iso' => 'VNM'],
 [ 'id' => '198',  'pai_nombre' => 'Yemen', 'pai_gentilicio' => 'YEMENÍ', 'pai_iso' => 'YEM'],
 [ 'id' => '199',  'pai_nombre' => 'Yibuti', 'pai_gentilicio' => 'YIBUTIANA', 'pai_iso' => 'DJI'],
 [ 'id' => '200',  'pai_nombre' => 'Zambia', 'pai_gentilicio' => 'ZAMBIANA', 'pai_iso' => 'ZMB'],
 [ 'id' => '201',  'pai_nombre' => 'Zimbabue', 'pai_gentilicio' => 'ZIMBABUENSE', 'pai_iso' => 'ZWE'],
    );

    public function run()
    {
        

        Schema::disableForeignKeyConstraints();

        DB::table('pais')->truncate();

        $this->saveOrUpdate('pais', self::$_DATE_PAIS);
    }
}
