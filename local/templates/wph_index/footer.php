<?php
/** @global $APPLICATION */
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
                    </div>
                </div>
                <div class="grid__item grid__item_2">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "kolos.studio:user.profile",
                        "",
                        [
                        ]
                    );?>
                </div>
            </div>
        </div>
	</body>
</html>