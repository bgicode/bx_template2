<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();
?>
<?php if ($arResult["isFormErrors"] == "Y"): ?>
    <?= $arResult["FORM_ERRORS_TEXT"]; ?>
<? endif; ?>
<?= $arResult["FORM_NOTE"] ?>
<?php
if ($arResult["isFormNote"] != "Y") {
?>
    <div class="contact-form">
        <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
            ваших требований
        </div>
    </div>

    <?=str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"] ) ?>

        <div class="contact-form__form-inputs">
            <?php
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                        echo $arQuestion["HTML_CODE"];
                    } else {
            ?>
                        <?php if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                            <span class="error-fld" title="<?= htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?>"></span>
                        <?php endif; ?>
                        <?php if ($arQuestion["CAPTION"] !== 'Сообщение'):?> 
                            <div class="input contact-form__input">
                                <label class="input__label" for="medicine_name">
                                    <div class="input__label-text">
                                        <?= $arQuestion["CAPTION"] ?>
                                        <?php if ($arQuestion["REQUIRED"] == "Y"):?>
                                            <?= $arResult["REQUIRED_SIGN"]; ?>
                                        <?php endif;?>
                                    </div>
                                    <?= str_replace('<input', '<input class="input__input"', $arQuestion["HTML_CODE"] ) ?>
                                    <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                                </label>
                            </div>
                        <?php endif; ?>
                    <?php
                    }
                }
                    ?>
        </div>

        <div class="contact-form__form-message">
            <?php
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                    echo $arQuestion["HTML_CODE"];
                } else {
            ?>
                    <?php if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                        <span class="error-fld" title="<?= htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?>"></span>
                    <?php endif; ?>
                    <?php if ($arQuestion["CAPTION"] == 'Сообщение'):?> 
                        <div class="input">
                            <label class="input__label" for="medicine_message">
                                <div class="input__label-text">
                                    <?= $arQuestion["CAPTION"] ?>
                                    <?php if ($arQuestion["REQUIRED"] == "Y"):?>
                                        <?= $arResult["REQUIRED_SIGN"]; ?>
                                    <?php endif; ?>
                                </div>
                                <?= str_replace('<textarea', '<textarea class="input__input" type="text" id="medicine_message" name="medicine_message"', $arQuestion["HTML_CODE"] ) ?>
                                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                            </label>
                        </div>
                    <?php endif; ?>
                    <?php
                    }
                }
                    ?>
        </div>

        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button" data-success="Отправлено" data-error="Ошибка отправки">                                
                <input class="form-button__title" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?> type="submit" name="web_form_submit" value="Оставить заявку" />
            </button>
        </div>
        
    <?=$arResult["FORM_FOOTER"]?>
<?php
} 
