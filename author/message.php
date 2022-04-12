<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Сообщения"); ?>&nbsp;<?$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.messages_users",
	"",
	Array(
		"ITEMS_COUNT" => "20",
		"PAGE_VAR" => "",
		"PATH_TO_MESSAGES_CHAT" => "",
		"PATH_TO_MESSAGES_USERS" => "",
		"PATH_TO_MESSAGES_USERS_MESSAGES" => "",
		"PATH_TO_MESSAGE_FORM" => "",
		"PATH_TO_SMILE" => "/bitrix/images/socialnetwork/smile/",
		"PATH_TO_USER" => "",
		"SET_NAVCHAIN" => "Y",
		"USER_ID" => $user_id,
		"USER_VAR" => ""
	)
);?>
<div class="car_section sec_ptb_100 clearfix">
	<div class="container">
		<div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
			<div class="col-lg-12">
			</div>
		</div>
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>