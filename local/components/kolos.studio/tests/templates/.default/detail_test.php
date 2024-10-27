<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$iCurHour = intval(date("H"));?>
<?if (false /*1 <= $iCurHour && $iCurHour < 4*/):?>
        <div class="container"
            	<div class="panel">						
            		<div class="content" style="text-align: center;">
            			<p style="font-weight: bold;">Уважаемый пользователь!</p>
            			<p>Прохождение тестов по обучениям будет доступно <b>сегодня с 8:30</b> (МСК).</p>
            			<p>На сайте проводятся технические работы.</p>
            			<p>Приносим извинения за доставленные неудобства!</p>
            		</div>
            	</div>
            	<br><br>
        </div>
<?else:?>
        <?
        $APPLICATION->IncludeComponent(
        	"imaginweb:tests.form",
        	"",
        	Array(
        		"CACHE_TIME" => $arParams['CACHE_TIME'],
        		"CACHE_TYPE" => $arParams['CACHE_TYPE'],
        		"IBLOCK_ID" => $arParams['IBLOCK_ID'],
        		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
        		"SECTION_ID" => $arResult['VARIABLES']['SECTION_ID'],
        	)
        );
        ?>
<?endif?>