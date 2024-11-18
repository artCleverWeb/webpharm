<?php

namespace Sprint\Migration;


class Version20241118203625 extends Version
{
    protected $author = "admin";

    protected $description = "Разделы ИБ Табельные номера: города";

    protected $moduleVersion = "4.12.6";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'system_city',
            'system'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Адыгея Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'd79210f59dba22468a8212719b9b555c',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Майкоп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c41222f050b83e4701e6a69466147ccc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Майкоп г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fc1f832f359bcf1eb22dba3551e91d83',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Новая Адыгея',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1c7197881196a53a9a4ee12c1d1774bc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  1 => 
  array (
    'NAME' => 'Алтайский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'd74dd2e3a200e288221779085ce58017',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Яровое г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'afbe672113e994822a3402a2ca52a8a1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  2 => 
  array (
    'NAME' => 'Астраханская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'c7d09629d334c51fd8ef175b29754ddb',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Астрахань г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4406dc160d840e0252c29358f17107fa',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  3 => 
  array (
    'NAME' => 'Башкортостан Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '2da46610241a7a11cb4b354c4605ec95',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Уфа',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0ce86d0f5e748b17f9809dbbc9672308',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Уфа г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bcc666527337838170ee621b3e0d318b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  4 => 
  array (
    'NAME' => 'Белгородская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '01ccceec697d28bd4b5f9c23d2188322',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Губкин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5956732879798011be346b3c2eb9f3ef',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Старый Оскол г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd75e0d87dfebf8b3935369325f216f13',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  5 => 
  array (
    'NAME' => 'Белгородская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '11714e3c1f5b36d68634bce5186a0ecb',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Старый Оскол',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f666ce68c8cc200b83835117d40f2482',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Строитель',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '699322c2c66024deb897743a2a652bfe',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  6 => 
  array (
    'NAME' => 'Владимирская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '7ab51edee4efacc1806b94a872bb0e48',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Владимир г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ee4d0edd2f6025b77f81a36ecb59f4dc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Ковров г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '16b6fa24aa9342d030b40a1a20f3ba22',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Муром г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1c217dd50b265f3a6530c2157245700a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  7 => 
  array (
    'NAME' => 'Владимирская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'a54149f292a658e403f37a8c1c143276',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  8 => 
  array (
    'NAME' => 'Волгоградская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '7c8f94e4f4a52cfddfa2b45f71bbee1c',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Волгоград г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '50afcdabaa183653487d847acf1e4d72',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Волжский г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'db0468038520eef22c6b9029b04e771b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Иловля рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8fb88fb68686746fcd3a7bd6c5d1414a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Камышин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'feccdd8907571270cd3bed003a6d3be6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Михайловка г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'eb31e00f7bf79077c17f237328542d5b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Средняя Ахтуба рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '989c3520c566b9bf99d19744fac61e73',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Суровикино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'de79d150359767a87afaeb847a3e364e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  9 => 
  array (
    'NAME' => 'Волгоградская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '936ef130dd09b528522f3582fbfada24',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  10 => 
  array (
    'NAME' => 'Вологодская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '5d9cc2d2d302d06d84204317f54018a3',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'волго',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5d1710aeb6d2442fb445b226efc399d5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Вологда',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '62e72736af5fabf29f84a657b8e795dc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Вологда г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '81b125613c6bfb6a19b3f8e4c476a94a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Череповец',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2c7247b82286e1ae408906ae466007a6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Череповец г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1b77552c0f29df41feb6282e4bef40da',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  11 => 
  array (
    'NAME' => 'Вологодская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'a5b4ab6fec60767631714f23dcc19b1c',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  12 => 
  array (
    'NAME' => 'Воронежская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '5338b7ab2e9eedf953d93afb58b72eab',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Воронеж г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd12e5b91bb16a44a6029fc3074824048',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  13 => 
  array (
    'NAME' => 'Воронежская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'ff82cc415d704532e305b519447b9b34',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Бобров',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '04e5657eb507e9ca0aa2acdb57ee155e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Борисоглебск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd3f18b030817f32749708320b9041336',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Бутурлиновка',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e2b81de16cf770f8b2463a5417f011e5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Воронеж',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '629c565027305e38ebf16aee3af4653a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'г.Борисоглебск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '769ce64cacc7847b38785f72441fb4a1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Каменка',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '622f2cc9c25bd1f0dd3551f0be60d9d5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Нижнедевицк',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b2df7244343dd9620cd4915b27f72363',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Новая Усмань',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f8d116196de0576cb6e1aae4743f54bb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Нововоронеж',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '58d8525a1aab5bf84a6b52d338cc8d58',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Острогожск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f510ca243acf55260852cc46b66e12cb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Поворино',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5457c521f135d01844284625fce35d50',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Репьевка',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5ee6dfed4cc7cbcfc6f2ccbd87ac384d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Россошь',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8a5be4a68be879eb645d30b42450d23d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Семилуки',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6be09f76e0bd08d869d57b862a9edf8b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  14 => 
  array (
    'NAME' => 'г. Москва',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'd435f1e0671a1747004755faa8323a47',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  15 => 
  array (
    'NAME' => 'Жуковский г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'e925ed6f82640756620f957118d47c7a',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  16 => 
  array (
    'NAME' => 'Ивановская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '455fec3cb5b394a2a74a4e5a72281ce9',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  17 => 
  array (
    'NAME' => 'Иркутская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '2c169c78aab73ed3b51a0243309bc048',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Иркутск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1628f48d6b1397b6350ad6ee7a3e6c38',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  18 => 
  array (
    'NAME' => 'Иркутская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '0517c3211310c93670d2bffc43e9ea27',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  19 => 
  array (
    'NAME' => 'Йошкар-Ола',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '73ed2b7cd40f6f83e24c87ab6eab8490',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  20 => 
  array (
    'NAME' => 'Калужская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '0ab3a6c0fea3af9122e0a17a4c86e0c7',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Калуга г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9103e00b011669af751a754c3fa9fe5f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Обнинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f25203ac5a808fac3b2166d884378027',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  21 => 
  array (
    'NAME' => 'Калужская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'db995887fece9f689f2a14771417e88d',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  22 => 
  array (
    'NAME' => 'Камчатский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '3ecf58fb31c406db00caf526b635312a',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Вилючинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '089cd76ba7b5f64360a9aab8ef0e373f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Вулканный п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '25ef6c6ee2b6abaaabbeca86e32c9c51',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Елизово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f4f7160e91fd6460decf26d3ad846bba',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Петропавловск-Камчатский',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e56ba33479bd2ac3aca3b0fa6ef34dcc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Петропавловск-Камчатский г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '03df42a637bd2bfd42e44414123fc79a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  23 => 
  array (
    'NAME' => 'Кемеровская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '11232794f13eddfb635ddc4aee5193cd',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Ильинка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0f623d1b49ca14ab8205c450d2d61cb2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Кемерово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '62906a9e9026c41da58be75f85de24cf',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Киселевск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '51be8d6d11be101e3b9fe829cb2d8d44',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Междуреченск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2b5a41a283158ad07dac4b84d807ddc3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Новокузнецк г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6f5b2647b0a5c7ebb06903b6e55e6187',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Прокопьевск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7304f21497e2b764a01afa013da92126',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Юрга г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5f98556f344b963748e712e544eaaa85',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  24 => 
  array (
    'NAME' => 'Кемеровская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '3ddb0eb4c727436b055394f9f4fb80a3',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  25 => 
  array (
    'NAME' => 'Ковров г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'fab2f926c2dbb7ec8410c1d2695a2dbc',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  26 => 
  array (
    'NAME' => 'Костромская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '7f0fe947d60945cc17d285808cdbdb4b',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  27 => 
  array (
    'NAME' => 'Краснодарский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '32c8b912d27b1554712f384ccb60ec6a',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Абинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '15aa529e71b98125de5eadbbb9dd3ace',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Анапа г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '728ad5adb8773eb3713d810e67226f05',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Апшеронск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '23d08af49d70160e2df4c0c2a1f3060a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Армавир',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8ba2061e1bb4185320a102e4b36b6587',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Армавир г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '465030b2e093d104a35edf1d5cfb23d0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Архангельская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e9216f6dbaf2d44a9f77a27a11117124',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Ахтырский пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2da42ba92b7ca23cdaa1b2ed03af0933',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Белая Глина с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e42dead85c5e9716526421cf2364e3ad',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Белореченск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '59270f1fa87a9b4be1a820e07f343c68',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Бриньковская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4dc70a166aaf50ec36f46040fa5fe19d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Варениковская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '85e62b44d6ea62cbb234f418af7a8b80',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Вышестеблиевская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8c2eb72655dbd566f7584dfa337c59a0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Геленджик',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd12a0137cfc01c91b59568325a206ec6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Геленджик г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2b75f230716d4ffe7a73371b9411b8de',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Гулькевичи г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'da95bdc13665a543aa4eeb451b3f8051',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Должанская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6ca938f6f03eb040a6112e82e460350a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Дядьковская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '007dff0430ee43bf17344cf08147e048',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Ейск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c15b715843f56ca2b9b2845bf3e88fb0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Казанская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8de88fa45b4692b533d252603840d084',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      19 => 
      array (
        'NAME' => 'Калниболотская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b017849a3c93971a01823ee61f3288ee',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      20 => 
      array (
        'NAME' => 'Копанская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8144674d11b50b790e0b7db3eedffd8f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      21 => 
      array (
        'NAME' => 'Кореновск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5c26a3f8c6e5d4ac0969ada609a3265b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      22 => 
      array (
        'NAME' => 'Краснодар',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '91f3cc7454f1a0c7a2d09bcdc3cf634d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      23 => 
      array (
        'NAME' => 'Краснодар г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1ad0a1c07257aa7d47950419b090f9dc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      24 => 
      array (
        'NAME' => 'Красноярск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8c3aa72757a0797d99c3ba4028257f6b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      25 => 
      array (
        'NAME' => 'Кропоткин',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e593cdf43f3de7fde7f416cfbb5675cc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      26 => 
      array (
        'NAME' => 'Кропоткин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1bf8d0338e8d56a3518397373a11c913',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      27 => 
      array (
        'NAME' => 'Крымск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'becfcf74bc19509b42c331d7dd2ee3e7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      28 => 
      array (
        'NAME' => 'Курчанская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e115007e94b3b74978e46cc52fff8e69',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      29 => 
      array (
        'NAME' => 'Кущевская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4463657391a4e4f4af511900dd3aebe2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      30 => 
      array (
        'NAME' => 'Лабинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'be1b240060399f718a823621e1bc7174',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      31 => 
      array (
        'NAME' => 'Ленинградская',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f79fbec0288d923e2530bff3fe08a543',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      32 => 
      array (
        'NAME' => 'Ленинградская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bfa91a01a58e61781b8a148d2857f423',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      33 => 
      array (
        'NAME' => 'Майкоп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0c577c814ed2b68f8a224279a465b69b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      34 => 
      array (
        'NAME' => 'Нижнебаканская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c909ff461877feb8e43d997ab8c595b1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      35 => 
      array (
        'NAME' => 'Новая Адыгея',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5dbfd9921dd73ed391a9ed677be19ebb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      36 => 
      array (
        'NAME' => 'Новоминская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '59d4ff59b5671b65c0a66a072e8c38ad',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      37 => 
      array (
        'NAME' => 'Новорождественская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '093f06f977e107171530fa198f190c17',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      38 => 
      array (
        'NAME' => 'Новороссийск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '88e7cf53794f1e854d99b58820cab41d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      39 => 
      array (
        'NAME' => 'Новороссийск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd5718a72bdae1b67f7e1b189452f9082',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      40 => 
      array (
        'NAME' => 'Псебай пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '49d7bd002db434911c3f194625771dc4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      41 => 
      array (
        'NAME' => 'Родниковская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '48c3745eca3b3537e23ca3f852144a5c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      42 => 
      array (
        'NAME' => 'Северская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '226677944cb463a3ee331dcad2e48bb7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      43 => 
      array (
        'NAME' => 'Смоленская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '35fc2c745f57d96837f0704e8c4cde6e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      44 => 
      array (
        'NAME' => 'Сочи',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '121a31c59643c6f9d5579ab705e37871',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      45 => 
      array (
        'NAME' => 'Сочи г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f5dce122492df197a1bc5ffd3fc8da0d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      46 => 
      array (
        'NAME' => 'Стародеревянковская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4e1bb25e47940d39bc3cb6526588bf3e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      47 => 
      array (
        'NAME' => 'Староминская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9c2c5eca9c89b7ef3bd8b5a9eabba30e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      48 => 
      array (
        'NAME' => 'Стрелка п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '99a5063435d83e03f595f3cc6eb49f8c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      49 => 
      array (
        'NAME' => 'Тбилисская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1c88c1cac8e4c43ed053fbea0b28b19b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      50 => 
      array (
        'NAME' => 'Темрюк г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e6f28d61eb3bd5f72f0d29b09e212fce',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      51 => 
      array (
        'NAME' => 'Терновская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '019e21facd9ee9ea4b4e7ab58262fc7c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      52 => 
      array (
        'NAME' => 'Тимашевск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0126525bc61201944f8e0d1d63f3f991',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      53 => 
      array (
        'NAME' => 'Туапсе г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6366ce2909d599f2aab20a236dc1ddc5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      54 => 
      array (
        'NAME' => 'Удобная ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7dfd17f449ae33f92f459d4ba1e9ef17',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      55 => 
      array (
        'NAME' => 'Успенская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cfa3f186c0a67d21be205adf3b8b0ba4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      56 => 
      array (
        'NAME' => 'Успенское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'dc78d1e5e89231dd0bdf19a21eae5b6b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      57 => 
      array (
        'NAME' => 'Фастовецкая ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bea7a140e3ca50598637b88a5899ba4b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      58 => 
      array (
        'NAME' => 'Холмская ст-ца',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f23bfce68b576bcb38f2b24157f23f10',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      59 => 
      array (
        'NAME' => 'Черноморский пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '88bb7046d1e914a6bd244466ecf48e85',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  28 => 
  array (
    'NAME' => 'Красноярский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'bdf26b61cf285363fa2ed51e63c655e6',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Красноярск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '229e642d4e07f8d2547fff0924dd0eeb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  29 => 
  array (
    'NAME' => 'Курская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'b7bb4bf9b00ed6099dd089af50120020',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Железногорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '216d46b996dee0981b5aafe10c51b756',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Курск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bcf8f04f96491dc99e291d662a9e1739',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  30 => 
  array (
    'NAME' => 'Курская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'd5b212cf1ee2f523f91d16fe7de869f5',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Дмитриев',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1feea2f7f3645235109a0e9d6c26bf09',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Железногорск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1ab23fefd898a81e55742f0c30ff2be8',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Курск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fcfbd817b0273b39ab5bd5f1fe4c177d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Курчатов',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '903a6a98a0cd451968f38012d47f4d0b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Обоянь',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bd4598e927f985c2997c3b81c58df5fd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Рыльск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ff4789b12abbbe25b78032c411d31625',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Теткино',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '75b13d6e65b4c3d62efcc0d6265bd7fb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  31 => 
  array (
    'NAME' => 'Ленинградская',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '413f3d374f2357ff0aa66541bb49a377',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Санкт-Петербург',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd1378a5208e30fb6d04b93d733b61efe',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  32 => 
  array (
    'NAME' => 'Ленинградская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '3d84f4f5e52e9930f29e5648f9745768',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Бокситогорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'babc9d0c5549400825619893ced249c9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Виллози д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '708b60916cddae53cd69be36717f0559',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Волосово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8a787d0f6cfad7e145a9745dd7950501',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Волхов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9831247ae9fbcd5d91965c84f6c97fa6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Всеволожск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3f7574c88c66947fb3189a332dae0ab6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Выборг г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f4fa1a4fe575b08fb0ed5b4f5112f0ee',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Гатчина г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '867bf98a2f27ea5a950cb138d9155138',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Ивангород г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0333647cd66890aa766fc21bcf129a7e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Кингисепп г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3d75952bb83557ba7ddcea677225fe43',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Кириши г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '01c3ce3ebb05191ea87397e0582924d9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Кировск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6b5a6911ec428cde1360bdb5e87d89d4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Коммунар г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4bae629786f2b058fc101e781125c562',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Кудрово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '09978da1f513973bb07ac1800f9c5b28',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Лодейное Поле г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '808788aebbcbb75b634cd47337ff3a2a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Луга г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e491ae24adc3e4d109faa6ec6992eb1a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Мурино п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd6060376a614cdc473ab6310f6a285e1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Никольское г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '281a025b1e3299cd07677dd7f1ea76c0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Новое Девяткино д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9b5e44adfa870fb718b49c6822433a71',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Отрадное г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'dd95a9438604169e432f26f3b9fdd80c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      19 => 
      array (
        'NAME' => 'Пикалево г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4e8af7093ea4cfc2850a08f9496d2d27',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      20 => 
      array (
        'NAME' => 'Подпорожье г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a31bcfe014599dc5a3d75eb9431cbdee',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      21 => 
      array (
        'NAME' => 'Приладожский пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '53e4016352aa4169ccd5b21f9dbab3d2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      22 => 
      array (
        'NAME' => 'Приозерск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ccb3aed87228d9c16e26a1e0d7017e22',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      23 => 
      array (
        'NAME' => 'Светогорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '37f32efbea976eac6cabab197647ae0b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      24 => 
      array (
        'NAME' => 'Сертолово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0890dbe8fd85729354d627e7e900ed0e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      25 => 
      array (
        'NAME' => 'Сланцы г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a58f2e8cb8760267859831866ac17dfd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      26 => 
      array (
        'NAME' => 'Сосновый Бор г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ead17e28d297b1d403870e0545a1d702',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      27 => 
      array (
        'NAME' => 'Тихвин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '17b9baa49f41130c554a311367615dd2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      28 => 
      array (
        'NAME' => 'Тосно г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2f14471bc2f71434c67d267b304d564f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      29 => 
      array (
        'NAME' => 'Шлиссельбург г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '739959844e60036478774c3fbc170580',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  33 => 
  array (
    'NAME' => 'Липецкая обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'c27b2c82747184e97ced65bc7e5fab5b',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Липецк',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '49813f1b60ea1f4b82da8eb3ff0895fa',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Липецк г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a35265eb73269342486b46f20c9fc6b3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  34 => 
  array (
    'NAME' => 'Липецкая область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '669176e5e10f4a96b9f2f777cd3f383f',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Липецк',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f1012e07ef398c73b924b6d596e10659',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  35 => 
  array (
    'NAME' => 'Марий Эл Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'dbde2ce97adf56b5944890980bfdd5f0',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Йошкар-Ола г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f0f54c5ac43813b52b1ac64565e633fa',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  36 => 
  array (
    'NAME' => 'Мордовия Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '2ae263d8efe3e125d30d3a45c1f301fa',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Рузаевка г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3542b7e63a12c8478c0b5fd5ebf1f3bf',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Саранск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '94276e2eb7ce5d249815082f7750adfb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  37 => 
  array (
    'NAME' => 'Москва г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '8c58a1176549f48debca25e3b1d310a3',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Зеленоград г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '118d2c3a8fe9a557a7f0d4dd2b2dae6a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Москва г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cf1a35d37c81125bd3f65250e8865d2f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Сосенское п,',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '011c49565af1408a9042796a8229f985',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Щербинка г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '67d7fe14b22bf34a3d2f6cd86bda5095',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  38 => 
  array (
    'NAME' => 'Московская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '58fbb300579bc75cb48034f071a5e3b7',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Аносино д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '08ca0432893f96395f9d4c4ec42e14ff',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Видное г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '93a3eef27d3486057945bbe5b234805b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'ВНИИССОК п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f6cf843414d54e11996fe4f1fe1b5a65',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'г. Звенигород',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9c9e84ee4b4661c0349e83e0bd4ced2d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'г. Одинцово',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c89ac5d7a5fe40effa312fcddf179abb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Горки-10 п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0dc75489c9c5a8f779a17673c9c53c9f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Дедовск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c5bf9eecde97a6b9e5a07ae969e83c0e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Долгопрудный г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '10b98738073299a2a92da832d15869f0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Домодедово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bb8a75cea6d5a0ad4e984e6c709416c5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Дубна г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a7c21541c8a87201f3cdf7f9ea36a389',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Жуковский г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5ea7a9c84896ca4904faf0507b815766',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Коломна',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'facd0af7d9d130990e41d750a5ff66ae',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Королев г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd630a713ca10c9e4eb1c309044faad21',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Котельники г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5134995d40dbd68bc81670410b4a1a35',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Красногорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7344c6b88efabcd71ed25d0ee2b51c29',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Лобня г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3cd7eace302d54f3fccfdb45dbf5af0c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Люберцы г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a9498a322727d470f22db3f4d9b63aba',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Мытищи г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '51d012c285c06bf98aa5f3302c9c9991',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Наро-Фоминск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '22b4ede9cab364329504457771298f48',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      19 => 
      array (
        'NAME' => 'Новоивановское рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '51225932d4529e25eaefed1868670b98',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      20 => 
      array (
        'NAME' => 'Ногинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b2af6290076b9809e75c26631da71abf',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      21 => 
      array (
        'NAME' => 'Одинцово',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ba51802a5054daebbb59ba3a9ee2a0bc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      22 => 
      array (
        'NAME' => 'Одинцово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3efa5097d64d60401d8f122cb8fdf0cc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      23 => 
      array (
        'NAME' => 'Октябрьский рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '804ddaa5f4ec6de0c644f98798a1e7cd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      24 => 
      array (
        'NAME' => 'Павловский Посад г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5ebb4bdc16eb39ef7917afbc2aeec1d7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      25 => 
      array (
        'NAME' => 'Подольск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '908aae32570893b1faaa932508df8c9b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      26 => 
      array (
        'NAME' => 'Подольск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e9ef65272a08d7947284ab3d8dab4bf7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      27 => 
      array (
        'NAME' => 'Путилково д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd6ffd614e30768bf237c835e182c358c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      28 => 
      array (
        'NAME' => 'Пушкино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5248d85997f3a15ad6cefa2490e01093',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      29 => 
      array (
        'NAME' => 'Развилковское с/п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '295589ad9191d42e4292a73f87597843',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      30 => 
      array (
        'NAME' => 'Реутов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '44b4c6f1f4f801222e6f284491a716a6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      31 => 
      array (
        'NAME' => 'Руза г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'de753cd7c9b828687853193ffb3ab670',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      32 => 
      array (
        'NAME' => 'с. Павловская Слобода',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'eb881082d859cb4b604e64a2948ba759',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      33 => 
      array (
        'NAME' => 'Сергиев Посад г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b2920cfc01d0ac96463fc034618a0122',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      34 => 
      array (
        'NAME' => 'Серпухов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '27a807c91d3afb1ac6df62755e1b2e06',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      35 => 
      array (
        'NAME' => 'Солнечногорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '47e1ba54f5eb1c2ed1125884ad53c5ce',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      36 => 
      array (
        'NAME' => 'Ступино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd67e3d1a3d994455fac7f6dd6aa6a7e4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      37 => 
      array (
        'NAME' => 'Троицк г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9ed8645b18d11c17063bb36502f0f6b4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      38 => 
      array (
        'NAME' => 'Фрязино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fede02cb775d130e6c0aef6eb3e06309',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      39 => 
      array (
        'NAME' => 'Химки г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '76e3fa8870d7a97e1cecb338e2272565',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      40 => 
      array (
        'NAME' => 'Щелково г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '26b7f6d9096379e4f0d872d95e133c66',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      41 => 
      array (
        'NAME' => 'Щербинка',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '562b0d2897e419c3a7217082e3daa6ff',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      42 => 
      array (
        'NAME' => 'Электросталь г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'db703cc4fe0000a2f114904d20c18067',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  39 => 
  array (
    'NAME' => 'Московская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '33e3d47caea83354d2bdd087296b331f',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'г. Звенигород',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b0daaf574ea122569b1ebd0e41aaca3d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'с. Павловская Слобода',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '38e117b9298a16942ab9e37ccc55c6e2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  40 => 
  array (
    'NAME' => 'Нижегородская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'ec958ea5437071c50b6f1bcd43782e49',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Арзамас г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '66c9fe3d8d59176cb25f0f1b18734232',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Афонино д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd394f819356d4e2d7c295c445fc7d00b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Балахна г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e6bc6e05360f3757c14550e0cc83ef8f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Бор г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5e73b801b7a3275f30d124dbd27aa831',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Выкса г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8121bbb8f46dd49863a3e897c897c706',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Городец г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '370d785b6dc71db678fe318c1849ade9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Дзержинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f072eefdcff0f7c8d137093c5ba6259f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Заволжье г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4d96297648ed607140e7f0d2baafe4eb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Кстово г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '04c414598d64338d035bebff76fc5ced',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Кулебаки г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3b644975f63da16d8c551a39843f68c6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Лысково г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e529d11cfed2e030ea1d85908eebd65c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Нижний Новгород г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7f62665766fccc64df58da8251e04de7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Саров г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7ad2d67cd427c27bb3d8dd6149a4b752',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Семенов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4922459ab6972d631e9a6e38b784a9c0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Сергач г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'eec465c31b70448224c434151cc0b7df',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Урень г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6c9d5d76b143e0d6dd2bfdd09890ae84',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Шахунья г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5c32001be29f9a7a90dbd19c41d911ae',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  41 => 
  array (
    'NAME' => 'Нижегородская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'eb537858cc3c6bea8492827621e6d7a8',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Нижний Новгород',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a16c7849ebf37b5d45e391ecaa71cf14',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  42 => 
  array (
    'NAME' => 'Нижний Новгород г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '2b09668bf232e3675912c34a434ae6fc',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  43 => 
  array (
    'NAME' => 'Новгородская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '28add9db1fdc53d0612ce2fd79571b20',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  44 => 
  array (
    'NAME' => 'Новосибирская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '53dc80b6104b31125b97b3accdded9d8',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Андреевка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '044eb2da26e3cc76c0e38db8af2f6434',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Баган с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0c831e9cd588dd7ccec29e010623cc9c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Барабинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e05f65239d6c01333d2a1900e28bf4a4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Бердск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '204d22931dd0d9c4ad4419a8c2e8099a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Березиково с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6b828e4c7e0703f3c80bfe0f898bdbfe',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Битки с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fe365548e235c5daaac4e308cea24999',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Блюдчанское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c03c1f7dd5c4634d1771d970373d0a28',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Болотное г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '76a0877a4934bfd1b556df9c1748d4c3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Болтово с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7da371bf05bb47d4a5cdd4f543c42845',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Боярка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8c17c1c630c74657562cd742d537d314',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Быструха с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a0eada125f781a9ad8c88f9686986685',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Венгерово с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '05466166b4c3056fc9ec30fa5596713e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Верх-Ирмень с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '55c5bdeadd47d278765cbed898864938',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Гжатск с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ce3be97e38eb45e21c656ed868f10717',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Горный рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '52d212e1f6b3dde530165b7cf2054f82',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Довольное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '14d00130520bf5b017ac491f02ce0a18',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Дорогино рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f14dc29d86f3c15d5b3b75984dd2834e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Евсино ст',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '44a8d59899f7cf4c64fc648db08236e1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Жуланка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5b03bf3cca2a066e2890828c866b2ba5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      19 => 
      array (
        'NAME' => 'Заковряжино с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd85f31500daf8c7df69ea181e35cb638',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      20 => 
      array (
        'NAME' => 'Здвинск с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '427238fdc07e3571fd357ea8635c15cb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      21 => 
      array (
        'NAME' => 'Зюзя с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '96d34ac9ffd0e943236fe5ae56531ed4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      22 => 
      array (
        'NAME' => 'Искитим г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e9b9dc0d6978709d63ca9cbd7963b198',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      23 => 
      array (
        'NAME' => 'Казачий Мыс с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '92c6ea7f55596d4ebc3f814a601890d3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      24 => 
      array (
        'NAME' => 'Карасук г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '309b93c3c78bf9e0a004d5c8c6a68106',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      25 => 
      array (
        'NAME' => 'Каргат г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8fde4a34d7a7a5f8491659c780b84dd2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      26 => 
      array (
        'NAME' => 'Кирза с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '02342be68a43b2ccf7fc84a816db32de',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      27 => 
      array (
        'NAME' => 'Колывань рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '160ec92794ae3c7c99fd7a9cc43050d8',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      28 => 
      array (
        'NAME' => 'Коченево рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '86e9b3244b3f7c6a2e8eaaf8bc312d33',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      29 => 
      array (
        'NAME' => 'Кочки с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '15091205d5922ca20687febcb1921c57',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      30 => 
      array (
        'NAME' => 'Краснозерское рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b270a582e5d0cec008d4551fa5acf0d3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      31 => 
      array (
        'NAME' => 'Краснообск рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cc52b2ba277b77c5c36f6cfe58b7efb5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      32 => 
      array (
        'NAME' => 'Круглоозерное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '03124cbbb5bf7f28b254cb00072894a6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      33 => 
      array (
        'NAME' => 'Куйбышев г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c3f9e20581fb890d55998af6b5acb343',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      34 => 
      array (
        'NAME' => 'Купино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f3c154b4fc3a0b3d90013312f2dad910',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      35 => 
      array (
        'NAME' => 'Кыштовка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '346c6c988d0e909aa960dbf570cae475',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      36 => 
      array (
        'NAME' => 'Легостаево с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cb098ff9b1d4d4fe465e950767314559',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      37 => 
      array (
        'NAME' => 'Линево рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a1125cd99f422b42e61a5472834d429b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      38 => 
      array (
        'NAME' => 'Листвянский п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b649bad750fc8525041464398a940a02',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      39 => 
      array (
        'NAME' => 'Лянино с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '68d0306f47016c28f41ab9b337e54b8c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      40 => 
      array (
        'NAME' => 'Мамонтовое с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '25eeb854f1fdc048d28676b0728038da',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      41 => 
      array (
        'NAME' => 'Маршанское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b2370562978cb5187051a8970e8e9737',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      42 => 
      array (
        'NAME' => 'Маслянино рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bea510cac0665bb4930fb92095ef902f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      43 => 
      array (
        'NAME' => 'Мошково рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8f5a3643b72415b2bc801d3fc7c24a17',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      44 => 
      array (
        'NAME' => 'Новокремлевское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a21b712d87cdff9846c1349cc2fc29a4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      45 => 
      array (
        'NAME' => 'Новомихайловка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9493915794d4e49d1f16047b4cab37bd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      46 => 
      array (
        'NAME' => 'Новопервомайское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a5620e52c69b582b5996b35fcd83534f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      47 => 
      array (
        'NAME' => 'Новосибирск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fb37651725098f5e7309a1e4d419d89b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      48 => 
      array (
        'NAME' => 'Новоярково с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'dc44529d1eb22f3e46852f25a811f3a2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      49 => 
      array (
        'NAME' => 'Обь г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd58fc3b782436cd0e9f9408fb8f07e87',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      50 => 
      array (
        'NAME' => 'Озеро-Карачи п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1c780482cf7779ac95930da179708084',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      51 => 
      array (
        'NAME' => 'Ордынское рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7ae98e7cdb16ce92bc5b04e01531e93d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      52 => 
      array (
        'NAME' => 'Пихтовка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c7b60019dc78a7ef9a32ae8121c2977c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      53 => 
      array (
        'NAME' => 'Поваренка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'dcd587068c999829d76bf8b17b2dff0c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      54 => 
      array (
        'NAME' => 'Пойменное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8774e8687b3ca71cc0f79834c8d7932b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      55 => 
      array (
        'NAME' => 'Посевная рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '673fdc29fa208632d1a56b71c51fe380',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      56 => 
      array (
        'NAME' => 'Прокудское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '174bc3da7671f2eb09f6d5210b9c1013',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      57 => 
      array (
        'NAME' => 'Пролетарский п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e20bdc9be0c9b7b27d0cc83ffd1570ec',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      58 => 
      array (
        'NAME' => 'Решеты с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6c630dd928b9b4c836e30ec32bbbf385',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      59 => 
      array (
        'NAME' => 'Романовка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7502975d6336987d754aa2f856974103',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      60 => 
      array (
        'NAME' => 'Савкино с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '41ae2e28627bb2ccfae9c8d9ff0ee5ea',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      61 => 
      array (
        'NAME' => 'Северное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '73b54af09ee68f1610b92be76e781524',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      62 => 
      array (
        'NAME' => 'Сибирцево 2-е с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '59544ff1db82bb4d1e122d64f8f2794d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      63 => 
      array (
        'NAME' => 'Согорное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b2ea6caaa0fec579e0fe4f4accdf2d0b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      64 => 
      array (
        'NAME' => 'Спирино с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fb1ca9377a3562f9ed195e938b59c724',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      65 => 
      array (
        'NAME' => 'Станционно-Ояшинский рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '27a3da871aa924f61e0fd4c846da5e7c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      66 => 
      array (
        'NAME' => 'Студеное с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8fe21c061f6a33ad1b3e32d9cb133027',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      67 => 
      array (
        'NAME' => 'Сузун рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3696dc1a352453584c099db55a94133b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      68 => 
      array (
        'NAME' => 'Табулга п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7e81601e91b545bc93b191c062504a66',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      69 => 
      array (
        'NAME' => 'Таскаево с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a44bd9e445e96978667d4e0764e1f69a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      70 => 
      array (
        'NAME' => 'Татарск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '77b683f5316d210f23267901fee43a7b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      71 => 
      array (
        'NAME' => 'Ташара с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '86eff6bc69212b99c6b29c1300774fde',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      72 => 
      array (
        'NAME' => 'Тогучин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5b83eb0a78a704ed04792ef88d0d9f27',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      73 => 
      array (
        'NAME' => 'Убинское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '347cda73129516a653b1dfdeca0b090a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      74 => 
      array (
        'NAME' => 'Увальское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '60295d3f5aba8bf48cbdbbe9056a2246',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      75 => 
      array (
        'NAME' => 'Ужаниха с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9dc80de0b3100f0c868b7374daacd902',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      76 => 
      array (
        'NAME' => 'Усть-Тарка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ac85026e77cff28841e31dfbe8d95349',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      77 => 
      array (
        'NAME' => 'Устюжанино д',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4d9f999690f6eacaf4c39d31e0cf00eb',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      78 => 
      array (
        'NAME' => 'Утянка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7ed1babaeea47387318eda6777d1e348',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      79 => 
      array (
        'NAME' => 'Чаны рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '5096d2d2b595315b68d74ac86c09bbc5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      80 => 
      array (
        'NAME' => 'Черепаново г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b04a63c4302fa6a657a552d019ec6ee5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      81 => 
      array (
        'NAME' => 'Черновка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '894ad990221af1b71407bd0a697cc7fe',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      82 => 
      array (
        'NAME' => 'Чик рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '64095059b35451aa1c92295e5842a611',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      83 => 
      array (
        'NAME' => 'Чистоозерное рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c02e732307c94bf34b6a910872934b89',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      84 => 
      array (
        'NAME' => 'Чулым г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b3684a0adbfe6c0523cb3c2745e7091b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      85 => 
      array (
        'NAME' => 'Чумаково с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0f3411821859d5ad8041266657cf7111',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      86 => 
      array (
        'NAME' => 'Шарчино с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '02537239973b41dda7993bc983e6d6e6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      87 => 
      array (
        'NAME' => 'Шахта п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '44e2d7f765e3e6f6c36f829c5f554069',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      88 => 
      array (
        'NAME' => 'Шипуново с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cddcb98957240e04cc72df100c09f0f2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  45 => 
  array (
    'NAME' => 'Омская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '2a4a184f1ffee49b00818624815b3eb5',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Омск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd4fdc7ee02d86525a97d55752388df57',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  46 => 
  array (
    'NAME' => 'Орловская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '6e6686279b68c49539044575811404b1',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Болхов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8ba39c5e6ea23f1d1529a95cb69ec1e6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Верховье пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '47dd8c7cd3a679e40ce3ac9fc47f3fa0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Кромы пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '69529103d2067369beadf72ee55bc97a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Ливны г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '52ea38d680f4d4d838c5549ffa9db7aa',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Мценск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8ed547b6e9ea95cf7812bcbe222040f7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Нарышкино пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e3844175418a36a09dccd6f12d7c496a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'орел',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '296f4ed76002e3e4720268ac23f3208b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Орёл г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9e7b67174a73db4df8d2870bd7740dcf',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Орел г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bac518adf0c7501c8efa12fbe82b8b78',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  47 => 
  array (
    'NAME' => 'Орловская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '4ce1b0ce46c99265563fcdb7a81bf66b',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  48 => 
  array (
    'NAME' => 'Пензенская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '22b1e7c43c6226e31d15fecdcc08574b',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Каменка г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ac37295e248950c31b771846c93d3689',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Пенза г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e278a5b19c2e1f6cb8ad242d89c38d4e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  49 => 
  array (
    'NAME' => 'Приморский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '9c94c80cb2820ec435cbd34ee57fcf82',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Артем г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6986ca62498568ee666cde40b9176c94',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Владивосток г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a78beef2ce07ddbe55874b8bebdc76b4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Уссурийск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cb0a0c1cd3611015c8ce850469e61d10',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  50 => 
  array (
    'NAME' => 'Псковская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '7f575abf2751f4be3031ada80574e1c2',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Псков г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '55fcade836f52cc7c3b2b0f1238f052f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  51 => 
  array (
    'NAME' => 'Псковская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'dfa5f8ad2bb7b88c4bdd9aba05749734',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  52 => 
  array (
    'NAME' => 'Республика Марий Эл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'b3b040ac0b2ca2854f0c238fafe6d8c9',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  53 => 
  array (
    'NAME' => 'Республика Татарстан',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'e904ddce33ec8306fbbde9e4e56718be',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  54 => 
  array (
    'NAME' => 'Ростовская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '8807e467c9dfa37debe5a4fcafc9faa4',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Аксай',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e724b9d22fd0b2307acc455841849260',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Аксай г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'eb57b6df17fcaeef469ad7399c7f676e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Батайск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '63085f208a51e43936022ce41447ba84',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Волгодонск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '148ec79c946dd6c791c87789bf1891c3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Глубокий рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '51b926ae54bbe071dedffa3a2765f3f5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Каменск-Шахтинский',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fe982e16d01e7827e2c2942e20419c10',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Лиховской мкр',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cc23a7b60aba9445a67ad6ef370b0f1a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Новочеркасск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ccb77dae5387341cb44a1c228ca6c1b1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Новочеркасск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '009d3d980361984477dc7341c72e251c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'п.Верхнетемерницкий',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd1c08500498a394eb08cb4f817ce0b60',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Ростов',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e811c6a9bc15d94e15855a57551b1075',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Ростов-на-Дону',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd846deef0d4364a78150181804ad5822',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Ростов-на-Дону г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a28767c79af335c66660d0bc5ed1b642',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Таганрог',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '26968e5dd483f1d8b32075f0d43781da',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Таганрог г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3feedae317ff077ddfe07b76ffe221c5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Шахты',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '282fc4dafa5dc51fb8e50bf81a2b4568',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Шахты г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'eaadaa7e2fdeaf22f770a71992d3e9bd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  55 => 
  array (
    'NAME' => 'Рязанская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '67cbc0f371aa84ff400803b5fc843ae0',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Рязань г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '443800d4774f700fb663ad71a66926e3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  56 => 
  array (
    'NAME' => 'Рязанская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '76ee25bc1a8a1358a606eff3a72750f8',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  57 => 
  array (
    'NAME' => 'Самара',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'bc796fb1791f55d7f1949cbe05a652ad',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  58 => 
  array (
    'NAME' => 'Самарская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'ae7b855049f0c7049c7b1ae0fd4c8ead',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Кинель г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '293d8227e40f6457910f8ff43692b492',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Новокуйбышевск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '46d943e5b98ae89ab7648bb22af6651d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Отрадный г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'bf2d293eebd3e21fea7b2e4126fcdc55',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Самара',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9a96d4b8868647aebfc667fa9ffe7285',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Самара г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a1a09af498fdab7b6ddef20f16651da8',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Тольятти г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3b56ed46446d4daac4adbe216f4140da',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Чапаевск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e57de77ebbb2a631897d935c4fda298c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  59 => 
  array (
    'NAME' => 'Санкт-Петербург г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '426cb05c8c7e198a8acff041beddc71e',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Зеленогорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e846ccc37fa459931e2ec45171a1afc2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Колпино г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '983fedd1faf5cc8c0556176eb4fd5d0a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Кронштадт г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9c18fc61270fd0e19c56ae8399ac9c68',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Парголово п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'db3d60c0ac8359b00ba459ee8e5dc157',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Песочный п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9ce7fd79db051588231ee0a80d5fc77d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Петергоф г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9bf2f84fa6a9a111677a5f2891cc4118',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Понтонный п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '77559c842435d4f02b9e5777dc08ecab',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Пушкин г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6f3f29a2455cbd181755c6e24787e5f9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Репино п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '29579d46cf16a1d2ef8d0bdf1e60e2fa',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Санкт-Петербург г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8fdd91a38001d379935826ad1848bff8',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Сестрорецк г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ebc07ab000f69cb3f512c57ad0c01290',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'стр',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd7d24c57174bb11b548da858efcd670c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Стрельна п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ad39192f134254a317e6359768499250',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  60 => 
  array (
    'NAME' => 'Саратов г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '992d6a19da8a6b5e736b8b1f9b4e4069',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  61 => 
  array (
    'NAME' => 'Саратовская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'f6d615834a0c54ecca2638d05d148a18',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Базарный Карабулак рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '35455e63066b5ea8627a241c43c18ff1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Балаково г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cb67f9aae774b968162c2c264f433225',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Балашов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0c35530b0e0ac42b5954eee64da2be6f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Вольск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '59a673616de101716592c2c7ba5d208f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Вязовка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'cfc5dad432888da59e9df33355338b45',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Дубки п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '501ee1e38f902bffbcdc064e7f002eb6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Елшанка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9394a1f15d6098e4f6b9cf225676059a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Ершов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a4dbbf0933fc7d2346eca383a5e513f3',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Калининск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '40d76fcfd37d4ec3b046fc49e38fc542',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Красный Кут г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3b77c6db72b9a4c8db5db0d564a48413',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Лысые Горы рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'a6ed84200ed36c0319b4bc74bfa644b2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Маркс г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9f518c9a4b1025e7517e666e9c73f933',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Новопушкинское п',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1723ed890c26866a305d2d40dc64fd52',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Петровск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '62b20116818d1df3e55d56542eb5ad1e',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Пугачев г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '44fe3591f9d8cda797fe06b93df466c9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Ртищево г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'b14409e752cf8760c89949e8927e60be',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Саратов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '83df57edd1cc456d7cbab483a77c6784',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Светлый пгт',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3a98fa5d0ebe8a96ef64eea9833e74fd',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Соколовый рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2f2b7ebc95638f1813e9680009376458',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      19 => 
      array (
        'NAME' => 'Степное рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '1554be81992cdedf5fcfdd3342d6c760',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      20 => 
      array (
        'NAME' => 'Татищево рп',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f41b32c04bc70a29f889ef11567dc6ef',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      21 => 
      array (
        'NAME' => 'Узморье с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3f9c22811ed5e4596a22659a2587fc92',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      22 => 
      array (
        'NAME' => 'Хвалынск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '363f48eddc64c58d630230138413e8dc',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      23 => 
      array (
        'NAME' => 'Энгельс г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3d74d08e109c7cbf29b91236c5f86043',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  62 => 
  array (
    'NAME' => 'Саха /Якутия/ Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'bc89b6f5c754a3ea6f43917931b7fe1c',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Якутск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '67fffe8900c3c1da8bb0dcf6db47a71f',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  63 => 
  array (
    'NAME' => 'Свердловская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '70a7654dd2c8e068b4ca97bec4b65c16',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Екатеринбург г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2efc49e382d76ba46cbf09a9a2f1b786',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Нижний Тагил г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c111d6cd99ff6fc605b1903528f1ce03',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Ревда г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '92474bd82d1450b18a0efb8b8ee12eb6',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  64 => 
  array (
    'NAME' => 'Смоленская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '6d3ed86c0367341539f95183b6c372de',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Десногорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0d2bcf97d127428d718371aac3d9efa0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Смоленск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '43f7d672a857b7c342d1f24d4178758c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  65 => 
  array (
    'NAME' => 'Смоленская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'a2d1393e9cd9e647f98e4bffa54d8eb2',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  66 => 
  array (
    'NAME' => 'Ставропольский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '4ef1cdacc34fdd3497635a30a84bc776',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Благодарный г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4ab5e8c57bbe6f9ea423ce268482a0d0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Верхнерусское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0dd3624d47b09218c57069d3d88ef16d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Донское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '7130c6d50fee334a51355c3ec9d83b76',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      3 => 
      array (
        'NAME' => 'Ессентуки г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0868887e3751549a5aca2b894cf7de6b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      4 => 
      array (
        'NAME' => 'Железноводск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'af9a86fbe00b936537fb186b8d65fd98',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      5 => 
      array (
        'NAME' => 'Кисловодск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '6fcad7e4db55e07e5d619c6695074bef',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      6 => 
      array (
        'NAME' => 'Краснокумское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '806c827f8fe5a9cbf9a5c7c05573f8b5',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      7 => 
      array (
        'NAME' => 'Ладовская Балка с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f263dcb5696347f05a83d8816e364685',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      8 => 
      array (
        'NAME' => 'Лермонтов г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '80228e2b2064e42aef57aa0ffa6e8819',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      9 => 
      array (
        'NAME' => 'Минеральные Воды г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ff4b75f81a52e7f7edf65a11a18340f8',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      10 => 
      array (
        'NAME' => 'Михайловск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '29a29313545039fcb519daecd8e17d71',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      11 => 
      array (
        'NAME' => 'Михайловск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '07ecbe10daab66f3f56edd8cda150013',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      12 => 
      array (
        'NAME' => 'Невинномыск',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fbd1a4af33467aec3d0ef1fb46ea489c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      13 => 
      array (
        'NAME' => 'Невинномысск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2780c966e417cfce135b8a3d32b935a0',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      14 => 
      array (
        'NAME' => 'Пятигорск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ce104189986c3a340011377c7068a940',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      15 => 
      array (
        'NAME' => 'Ставрополь',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '3a41145c8b6daee44fc422dbe8d943c4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      16 => 
      array (
        'NAME' => 'Ставрополь г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9c6f29696a218d4d2c7dc3413ecd28a4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      17 => 
      array (
        'NAME' => 'Тахта с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'ec8f2e837f666ea34989c937f57796a1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      18 => 
      array (
        'NAME' => 'Труновское с',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '8580efd3ddcd4d80aedbccc13fd61553',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  67 => 
  array (
    'NAME' => 'Татарстан Респ',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'f86e03213274d36303a006b9f3b46226',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Набережные Челны г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'fd8ddac855a2e6796d71a7782d6cfbf7',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Нижнекамск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '160fe2ef24bb18b50d34b655c1695d7b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  68 => 
  array (
    'NAME' => 'Тверская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '43f35638c0db3adb3111ed28932c4cf9',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Тверь г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '2821f5a5d20003d0d3faef82622e45c9',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  69 => 
  array (
    'NAME' => 'Тульская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'bd153c212d5a77a37a9886f43fd145c1',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Донской',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '74472ed0131d3da014af84e841ea101d',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Тула',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '772348df527d4ee443c5d5bc80e2585c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Щекино',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0e34e53e11132fed8bd046b6f386bc89',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  70 => 
  array (
    'NAME' => 'Тульская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'e8ccfaf67fc2fbcb401665df5466f5d5',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  71 => 
  array (
    'NAME' => 'Тюменская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '13f6afa21e072cb2164b0ba0242cd0aa',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Сургут г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '9789fe88b64d47ad86a7443ecbfb6e0b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Тюмень г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '882557c9c80865fadbe225544d5bfcf4',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  72 => 
  array (
    'NAME' => 'Хабаровский край',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '59f86bf38d5815a1f8c45c01912eeb1b',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Хабаровск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '827c3d69078c9681776da99ec42b7560',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  73 => 
  array (
    'NAME' => 'Ханты-Мансийский Автономный округ - Югра АО',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '3709080b55e632a3052e288e2ac391cd',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Сургут г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '36c0429844bc9258d6f82cefa76afc7b',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  74 => 
  array (
    'NAME' => 'Чебоксары г',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '75d331d0fc565d0c004d77234bd160f1',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  75 => 
  array (
    'NAME' => 'Челябинская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'ce06e22628011a4ec122ca209279100c',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Челябинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '67a27d2795563e058cf296875071831a',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  76 => 
  array (
    'NAME' => 'Чувашская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '5cee91eb124e371e52562b794f70f923',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
  77 => 
  array (
    'NAME' => 'Чувашская Республика - Чу',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '7afd40fe609ec2c900ee66aac5092d75',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Канаш г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f7963bff44480183ee58994c4f3c91a2',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Новочебоксарск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'e593a388552542cea5da5e64452eb105',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Чебоксары г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '4279ae4cb30e5c06e340ea62cdd7155c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  78 => 
  array (
    'NAME' => 'Чувашская Республика - Чувашия',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '06c98cff6d1fa0a3ebba5665663c150a',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Канаш г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'c335055f3339b0629e550a6f900a4589',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Новочебоксарск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '098b069943ed1e46d91f40b7ea25d442',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      2 => 
      array (
        'NAME' => 'Чебоксары г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'd9d68dbb1f96c5373d1d534b68fb3766',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  79 => 
  array (
    'NAME' => 'Ярославская обл',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => '3df03258fad0e0cd0c513d9208e9b4c0',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
    'CHILDS' => 
    array (
      0 => 
      array (
        'NAME' => 'Рыбинск г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => 'f050cdafdd62ca58c39fb33438e4b8d1',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
      1 => 
      array (
        'NAME' => 'Тутаев г',
        'CODE' => NULL,
        'SORT' => '500',
        'ACTIVE' => 'Y',
        'XML_ID' => '0cb41ac518bb69683ee5648b9f9ffd6c',
        'DESCRIPTION' => NULL,
        'DESCRIPTION_TYPE' => 'text',
      ),
    ),
  ),
  80 => 
  array (
    'NAME' => 'Ярославская область',
    'CODE' => NULL,
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => 'e4adf3d24cc9454eeca1ec14e13062b4',
    'DESCRIPTION' => NULL,
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }
}
