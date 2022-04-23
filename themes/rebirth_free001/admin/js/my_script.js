jQuery(document).ready(function($){

  // ヘッダーコンテンツ　コンテンツのタイプ
  $(document).on('click', '.slider_type_radio_button li', function(event){
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
  });
  $(document).on('click', '.index_slider_type1_button', function(event){
    $(this).closest('.theme_option_field_ac_content').find('.index_slider_type1_option').show();
    $(this).closest('.theme_option_field_ac_content').find('.index_slider_type2_option').hide();
  });
  $(document).on('click', '.index_slider_type2_button', function(event){
    $(this).closest('.theme_option_field_ac_content').find('.index_slider_type1_option').hide();
    $(this).closest('.theme_option_field_ac_content').find('.index_slider_type2_option').show();
  });

  // color picker
  $('.c-color-picker').wpColorPicker();

  // rebox (lightbox)
  $(".rebox_group").rebox({
    selector:'a',
    zIndex: 99999,
    loading: '&loz;'
  });

    $('select.button_animation_option').change(function(){
    if ( $(this).val() == 'type1' ) {
      $(this).closest('.sub_box_content').find('.button_animation_option_type1').show();
      $(this).closest('.sub_box_content').find('.button_animation_option_type2').hide();
    } else {
      $(this).closest('.sub_box_content').find('.button_animation_option_type1').hide();
      $(this).closest('.sub_box_content').find('.button_animation_option_type2').show();
    }
  });

  // メインカラーを適用する
  $(document).on('click', '.use_main_color_checkbox input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).closest('li').find('.use_main_color').hide();
    } else {
      $(this).closest('li').find('.use_main_color').show();
    }
  });

  // 基本設定のロードタイプ
  $('select#index_tab_post_list_type').change(function(){
    if ( $(this).val() == 'recent_post' ) {
      $('#index_tab_post_list_order').show();
    } else {
      $('#index_tab_post_list_order').hide();
    }
  }).trigger('change');


  // 固定ページのカスタムフィールドの並び替え
  $(".theme_option_field_order").sortable({
    placeholder: "theme_option_field_order_placeholder",
    handle: '.theme_option_headline',
    //helper: "clone",
    start: function(e, ui){
      ui.item.find('textarea').each(function () {
        tinymce.execCommand('mceRemoveEditor', false, $(this).attr('id'));
      });
    },
    stop: function (e, ui) {
      ui.item.toggleClass("active");
      ui.item.find('textarea').each(function () {
       tinymce.execCommand('mceAddEditor', true, $(this).attr('id'));
     });
    },
    forceHelperSize: true,
    forcePlaceholderSize: true
  });


  //テキストエリアの文字数をカウント
  $('.word_count').each( function(i){
    var count = $(this).val().length;
    $(this).next('.word_count_result').children().text(count);
  });
  $('.word_count').keyup(function(){
    var count = $(this).val().length;
    $(this).next('.word_count_result').children().text(count);
  });


  // 固定ページのサイドコンテンツの表示設定
  $(document).on('change', '#page_sidebar_setting select', function(){
    if ( $(this).val() == 'type1' ) {
      $('#change_content_width').show();
      if ($("#change_content_width input").is(":checked")) {
        $('#page_option_content_width_setting').show();
      } else {
        $('#page_option_content_width_setting').hide();
      }
    } else {
      $('#change_content_width, #page_option_content_width_setting').hide();
    }
  }).trigger('change');
  // 固定ページの横幅を変更
  $(document).on('click', '#change_content_width input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $('#page_option_content_width_setting').show();
    } else {
      $('#page_option_content_width_setting').hide();
    }
  });


  // チェックボックスにチェックをして、ボックスを表示・非表示する（オーバーレイなどに使用）
  $(document).on('click', '.displayment_checkbox input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).parents('.displayment_checkbox').next().show();
    } else {
      $(this).parents('.displayment_checkbox').next().hide();
    }
  });
  $(document).on('click', '.displayment_checkbox2 input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).parents('.displayment_checkbox2').next().hide();
    } else {
      $(this).parents('.displayment_checkbox2').next().show();
    }
  });
  // チェックボックスにチェックをして、ボックスを表示・非表示する（オーバーレイなどに使用）・・・カスタムフィールド用
  $(document).on('click', '.displayment_checkbox_cf input:checkbox', function(event){
    if ($(this).is(":checked")) {
      $(this).parents('.displayment_checkbox_cf').parent().next().show();
    } else {
      $(this).parents('.displayment_checkbox_cf').parent().next().hide();
    }
  });


  // Googleマップ
  $(document).on('click', '.gmap_marker_type_button_type1', function(event){
    $(this).parent().next().hide();
  });
  $(document).on('click', '.gmap_marker_type_button_type2', function(event){
    $(this).parent().next().show();
  });
  $(document).on('click', '.gmap_custom_marker_type_button_type1', function(event){
   $(this).closest('.gmap_marker_type2_area').find('.gmap_custom_marker_type1_area').show();
   $(this).closest('.gmap_marker_type2_area').find('.gmap_custom_marker_type2_area').hide();
  });
  $(document).on('click', '.gmap_custom_marker_type_button_type2', function(event){
   $(this).closest('.gmap_marker_type2_area').find('.gmap_custom_marker_type1_area').hide();
   $(this).closest('.gmap_marker_type2_area').find('.gmap_custom_marker_type2_area').show();
  });


  // ロゴに画像を使うかテキストを使うか選択
  $(".select_logo_type .logo_type_option_type1").click(function () {
    $(this).closest('.theme_option_field_ac_content').find(".logo_text_area").show();
    $(this).closest('.theme_option_field_ac_content').find(".logo_image_area").hide();
  });
  $(".select_logo_type .logo_type_option_type2").click(function () {
    $(this).closest('.theme_option_field_ac_content').find(".logo_text_area").hide();
    $(this).closest('.theme_option_field_ac_content').find(".logo_image_area").show();
  });


  // Hoverアニメーション
  $(document).on('click', '#hover_type_type1', function(event){
    $('#hover_type1_area').show();
    $('#hover_type2_area').hide();
    $('#hover_type3_area').hide();
  });
  $(document).on('click', '#hover_type_type2', function(event){
    $('#hover_type1_area').hide();
    $('#hover_type2_area').show();
    $('#hover_type3_area').hide();
  });
  $(document).on('click', '#hover_type_type3', function(event){
    $('#hover_type1_area').hide();
    $('#hover_type2_area').hide();
    $('#hover_type3_area').show();
  });
  $(document).on('click', '#hover_type_type4', function(event){
    $('#hover_type1_area').hide();
    $('#hover_type2_area').hide();
    $('#hover_type3_area').hide();
  });


  // アコーディオンの開閉
  $(document).on('click', '.theme_option_subbox_headline', function(event){
   $(this).closest('.sub_box').toggleClass('active');
   return false;
  });
  $(document).on('click', '.sub_box .close_sub_box', function(event){
   $(this).closest('.sub_box').toggleClass('active');
   return false;
  });

  // サブボックスのtitleをheadlineに反映させる
  $(document).on('change keyup', '.sub_box .repeater-label', function(){
    $(this).closest('.sub_box').find('.theme_option_subbox_headline').text($(this).val());
  });

  // テーマオプションの入力エリアの開閉
  $('.theme_option_field_ac:not(.theme_option_field_ac.open)').on('click', '.theme_option_headline', function(){
   $(this).parents('.theme_option_field_ac').toggleClass('active');
   return false;
  });
  $('.theme_option_field_ac:not(.theme_option_field_ac.open)').on('click', '.close_ac_content', function(){
   $(this).parents('.theme_option_field_ac').toggleClass('active');
   return false;
  });


  // theme option tab
  $('#my_theme_option').cookieTab({
   tabMenuElm: '#theme_tab',
   tabPanelElm: '#tab-panel'
  });


	// radio button for page custom fields
   $("#map_type_type2").click(function () {
    $(".google_map_code_area").hide();
    $(".google_map_code_area2").show();
   });

   $("#map_type_type1").click(function () {
    $(".google_map_code_area").show();
    $(".google_map_code_area2").hide();
   });

  
	// 保護ページのラベルを見出し（.theme_option_subbox_headline）に反映する
  $(document).on('change keyup', '.theme_option_subbox_headline_label', function(){
		$(this).closest('.sub_box_content').prev().find('span').text(' : ' + $(this).val());
  });

  // Saturation
  $(document).on('change', '.range', function() {
    $(this).prev('.range-output').find('span').text($(this).val());
  }); 


	// AJAX保存 ------------------------------------------------------------------------------------
	var $themeOptionsForm = $('#myOptionsForm');
	if ($themeOptionsForm.length) {

		// タブごとのAJAX保存

		// タブ内フォームAJAX保存中フラグ
		var tabAjaxSaving = 0;

		// 現在値を属性にセット
		var setInputValueToAttr = function(el) {
			// フォーム項目
			var $inputs = $(el).find(':input').not(':button, :submit');

			$inputs.each(function(){
				if ($(this).is('select')) {
					$(this).attr('data-current-value', $(this).val());
					$(this).find('[value="' + $(this).val() + '"]').attr('selected', 'selected');
				} else if ($(this).is(':radio, :checkbox')) {
					if ($(this).is(':checked')) {
						$(this).attr('data-current-checked', 1);
					} else {
						$(this).removeAttr('data-current-checked');
					}

					// チェックボックスで同じname属性が一つだけの場合はマージ対策でinput[type="hidden"]追加
					if ($(this).is(':checkbox') && $(this).closest('form').find('input[name="'+this.name+'"]').length == 1) {
						$(this).before('<input type="hidden" name="'+this.name+'" value="" data-current-value="">')
					}
				} else {
					$(this).attr('data-current-value', $(this).val());
				}
			});
		};

		// タブフォーム項目init処理
		var initAjaxSaveTab = function(el, savedInit) {
			// savedInit以外で更新フラグがあれば終了
			if (!savedInit && $(el).attr('data-has-changed')) return

			// 更新フラグ・ソータブル変更フラグ削除
			$(el).removeAttr('data-has-changed').removeAttr('data-sortable-changed');

			// 現在値を属性にセット
			setInputValueToAttr(el);

			// フォーム項目
			var $inputs = $(el).find(':input').not(':button, :submit');

			// 項目数をセット
			$(el).attr('data-current-inputs', $inputs.length);
		};

		// タブフォーム項目に変更があるか
		var hasChangedAjaxSaveTab = function(el) {
			var hasChange = false;

			// 更新フラグあり
			if ($(el).attr('data-has-changed')) {
				return true
			}

			// フォーム項目
			var $inputs = $(el).find(':input').not(':button, :submit');

			// ソータブル変更フラグチェック
			if ($(el).attr('data-sortable-changed')) {
				hasChange = true;

			// フォーム項目数チェック
			} else if ($inputs.length !== $(el).attr('data-current-inputs') - 0) {
				hasChange = true;

			} else {
				// フォーム変更チェック
				$inputs.each(function(){
					if ($(this).is('select')) {
						if ($(this).val() !== $(this).attr('data-current-value')) {
							hasChange = true;
							return false;
						}
					} else if ($(this).is(':radio, :checkbox')) {
						if ($(this).is(':checked') && !$(this).attr('data-current-checked')) {
							hasChange = true;
							return false;
						} else if (!$(this).is(':checked') && $(this).attr('data-current-checked')) {
							hasChange = true;
							return false;
						}
					} else {
						if ($(this).val() !== $(this).attr('data-current-value')) {
							hasChange = true;
							return false;
						}
					}
				});
			}

			// 変更ありの場合、更新フラグセット
			if (hasChange) {
				$(el).attr('data-has-changed', 1);
			}

			return hasChange;
		};

		// 初期表示タブ
		initAjaxSaveTab($themeOptionsForm.find('.tab-content:visible'));

		// タブ変更前イベント
		$('#my_theme_option').on('jctBeforeTabDisplay', function(event, args) {
			// args.tabDisplayにfalseをセットするとタブ移動キャンセル

			// タブAJAX保存中の場合はタブ移動キャンセル
			if (tabAjaxSaving) {
				args.tabDisplay = false;
				return false;
			}

			// タブ内フォーム項目に変更あり
			if (hasChangedAjaxSaveTab(args.$beforeTabPanel)) {
				if (!confirm(TCD_MESSAGES.tabChangeWithoutSave)) {
					args.tabDisplay = false;
					return false;
				}
			}

			// タブ移動
			initAjaxSaveTab(args.$afterTabPanel);
		});

		// ソータブル監視
		$themeOptionsForm.on('sortupdate', '.ui-sortable', function(event, ui) {
			// 更新フラグセット
			$themeOptionsForm.find('.tab-content:visible').attr('data-sortable-changed', 1);
		});

		// 保存ボタン
		$themeOptionsForm.on('click', '.ajax_button', function() {
			var $buttons = $themeOptionsForm.find('.button-ml');

			// タブAJAX保存中の場合は終了
			if (tabAjaxSaving) return false;

			$('#saveMessage').hide();
			$('#saving_data').show();

			// tinymceを利用しているフィールドのデータを保存
			if (window.tinyMCE) {
				tinyMCE.triggerSave();
			}

			// フォームデータ
			var fd = new FormData();

			// オプション保存用項目
			$themeOptionsForm.find('> input[type="hidden"]').each(function(){
				fd.append(this.name, this.value);
			});

			// 表示中タブ
			var $currentTabPanel = $themeOptionsForm.find('.tab-content:visible');

			// 表示中タブ内フォーム項目
			$currentTabPanel.find(':input').not(':button, :submit').each(function(){
				if ($(this).is('select')) {
					fd.append(this.name, $(this).val());
				} else if ($(this).is(':radio, :checkbox')) {
					if ($(this).is(':checked')) {
						fd.append(this.name, this.value);
					}
				} else {
					fd.append(this.name, this.value);
				}
			});

			// AJAX送信
			$.ajax({
				url: $themeOptionsForm.attr('action'),
				type: 'POST',
				data: fd,
				processData: false,
				contentType: false,
				beforeSend: function() {
					// タブAJAX保存中フラグ
					tabAjaxSaving = 1;

					// ボタン無効化
					$buttons.prop('disabled', true);
				},
				complete: function() {
					// タブAJAX保存中フラグ
					tabAjaxSaving = 0;

					// ボタン有効化
					$buttons.prop('disabled', false);
				},
				success: function(data, textStatus, XMLHttpRequest) {
					$('#saving_data').hide();
					$('#saved_data').html('<div id="saveMessage" class="successModal"></div>');
					$('#saveMessage').append('<p>' + TCD_MESSAGES.ajaxSubmitSuccess + '</p>').show();
					setTimeout(function() {
						$('#saveMessage:not(:hidden, :animated)').fadeOut();
					}, 3000);

					// タブフォーム項目初期値セット
					initAjaxSaveTab($currentTabPanel, true);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$('#saving_data').hide();
					alert(TCD_MESSAGES.ajaxSubmitError);
				}
			});

			return false;
		});

		// TCDテーマオプション管理のボタン処理
		// max_input_vars=1000だとTCDテーマオプション管理のPOST項目が読みこめずエクスポート等が出来ない対策
		$('#tab-content-tool :submit').on('click', function(){
			var $currentTabPanel = $(this).closest('.tab-content');
			var isFirst = true;
			$('.tab-content').each(function(){
				if ($(this).is($currentTabPanel)) {
					return;
				}
				if (isFirst) {
					isFirst = false;
					return;
				}
				$(this).find(':input').not(':button, :submit').addClass('js-disabled').attr('disabled', 'disabled');
			});
			setTimeout(function(){
				$('.tab-content .js-disabled').removeAttr('disabled');
			}, 1000);
		});

		// タブごとのAJAX保存 ここまで

		// 保存メッセージクリックで非表示
		$themeOptionsForm.on('click', '#saveMessage', function(){
			$('#saveMessage:not(:hidden, :animated)').fadeOut(300);
		});
	}

	// ユーザープロフィール 画像削除
	$('.user_profile_image_url_field .delete-button').on('click', function() {
		if ($(this).attr('data-meta-key')) {
			var $cl = $(this).closest('.user_profile_image_url_field');
			$cl.append('<input type="hidden" name="delete-image-'+$(this).attr('data-meta-key')+'" value="1">');
			$(this).addClass('hidden');
			$cl.find('.preview_field').remove();
		}
	});

});



// load functionは以下にまとめる
(function($) {
  $(window).load(function () {

    // ボタンアニメーション
    $('select.cb_button_animation').each(function(){
      if ( $(this).val() == 'type1' ) {
        $(this).closest('.cb_content').find('.cb_button_animation_type1').show();
        $(this).closest('.cb_content').find('.cb_button_animation_type2').hide();
      } else {
        $(this).closest('.cb_content').find('.cb_button_animation_type1').hide();
        $(this).closest('.cb_content').find('.cb_button_animation_type2').show();
      }
    });
    $('select.button_animation_option').each(function(){
      if ( $(this).val() == 'type1' ) {
        $(this).closest('.sub_box_content').find('.button_animation_option_type1').show();
        $(this).closest('.sub_box_content').find('.button_animation_option_type2').hide();
      } else {
        $(this).closest('.sub_box_content').find('.button_animation_option_type1').hide();
        $(this).closest('.sub_box_content').find('.button_animation_option_type2').show();
      }
    });

    // メインカラーを適用する
    $('.use_main_color_checkbox input:checkbox').each(function(){
      if ($(this).is(":checked")) {
        $(this).closest('li').find('.use_main_color').hide();
      } else {
        $(this).closest('li').find('.use_main_color').show();
      }
    });

    // 日付が非表示の場合は、更新日のチェックボックスも隠す（MASSIVE）
    $('.blog_single_show_date input:checkbox').each(function(){
      if ($(this).is(":checked")) {
        $('.blog_single_show_update').show();
      } else {
        $('.blog_single_show_update').hide();
      }
    });

    // 固定ページテンプレートで表示メタボックス切替
    function show_lp_meta_box() {
      $('#index-tcd_meta_box-hide').attr('checked', 'checked');
      $('#index-tcd_meta_box').show().removeClass('closed');
      $('#lp_meta_box').show();
      $('#ranking_meta_box').hide();
      $('#page_header_meta_box').show();
      $('#post-body-content #postdivrich').hide();
      $('.editor-block-list__layout').hide();
      $('.edit-post-visual-editor .block-editor-block-list__layout').hide();
      $('#page_option_content_font_size_setting').hide();
      $('#change_content_width, #page_option_content_width_setting, #page_sidebar_setting').show();
    }
    function show_ranking_meta_box() {
      $('#index-tcd_meta_box-hide').attr('checked', 'checked');
      $('#index-tcd_meta_box').show().removeClass('closed');
      $('#lp_meta_box').hide();
      $('#ranking_meta_box').show();
      $('#page_header_meta_box').show();
      $('#post-body-content #postdivrich').hide();
      $('.editor-block-list__layout').hide();
      $('.edit-post-visual-editor .block-editor-block-list__layout').hide();
      $('#page_option_content_font_size_setting').hide();
      $('#change_content_width, #page_option_content_width_setting, #page_sidebar_setting').hide();
    }
    function normal_template() {
      $('#index-tcd_meta_box-hide').removeAttr('checked');
      $('#index-tcd_meta_box').hide();
      $('#lp_meta_box').hide();
      $('#ranking_meta_box').hide();
      $('#page_header_meta_box').show();
      $('#post-body-content #postdivrich').show();
      $('.editor-block-list__layout').show();
      $('.edit-post-visual-editor .block-editor-block-list__layout').show();
      $('#page_option_content_font_size_setting').show();
      $('#change_content_width, #page_option_content_width_setting, #page_sidebar_setting').show();
    }
    $('select#hidden_page_template').change(function(){ //ブロックエディタ対策
      if ( $(this).val() == 'page-lp.php' ) {
        show_lp_meta_box();
      } else if ( $(this).val() == 'page-ranking.php' ) {
        show_ranking_meta_box();
      } else {
        normal_template();
      }
    }).trigger('change');
    $(document).on('change', 'select#page_template, .editor-page-attributes__template select', function(){
      if ( $(this).val() == 'page-lp.php' ) {
        show_lp_meta_box();
      } else if ( $(this).val() == 'page-ranking.php' ) {
        show_ranking_meta_box();
      } else {
        normal_template();
      }
    }).trigger('change');


    // 固定ページの横幅を変更
    if($('select#hidden_page_template').val() == 'page-ranking.php') {
      $('#change_content_width, #page_option_content_width_setting').hide();
    } else {
      if ( $("#page_sidebar_setting select").val() == 'type1' ) {
        $('#change_content_width').show();
        if ($("#change_content_width input").is(":checked")) {
          $('#page_option_content_width_setting').show();
        } else {
          $('#page_option_content_width_setting').hide();
        }
      } else {
        $('#change_content_width, #page_option_content_width_setting').hide();
      }
    }
    if ($("#change_content_width input").is(":checked")) {
      $('#page_option_content_width_setting').show();
    } else {
      $('#page_option_content_width_setting').hide();
    }

    // サブボックスのtitleをheadlineに反映させる
    $('.sub_box .repeater-label').each(function(){
      if( $(this).val() != "" ){
        $(this).closest('.sub_box').find('.theme_option_subbox_headline').text($(this).val());
      }
    });

  }); // end load function
})(jQuery);