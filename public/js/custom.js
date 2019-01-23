$(document).ready(function() {
  // $('.job_search_option_triger').on('click', function() {
  //     $(this).toggleClass('open').next('.options_checkbox').toggle();
  // });

  $(".filter_search_triger").on("click", function() {
    $(this).toggleClass("open");
    $(".search_job_filters_holder").slideToggle(200);
  });

  // Menu Mob
  $(".mob_menu_icon").click(function(e) {
    e.preventDefault();
    $(".main_nav_mob").slideToggle(200);
  });

  // // New job ad options desc show/hide
  // $('.new_job_add_choose_option_item input').click(function() {
  //     $('.new_job_add_desc').addClass('none');
  //     $("input[type='radio']:checked").each(function() {
  //         $(this).next('.new_job_add_desc').removeClass('none');
  //     });
  // });

  // // Pop up job ad custom design
  // $('.job_ad_enter_instuction_btn').on('click',function(e){
  //     e.preventDefault();
  //     $('.custom_job_ad_popup').fadeIn(200);
  // });

  $(".popup_close").on("click", function(e) {
    e.preventDefault();
    $(".popUp").fadeOut(200);
  });

  $(".list_of_reports_item_holder").on("click", function(e) {
    e.preventDefault();
    $(".reports_popup_holder").fadeIn(200);
  });

  $(".popup_new_language_user_item p").click(function() {
    $(".new_language_user_list").fadeToggle(200);
  });

  $(".user_profile_languages_holder .edit_link").on("click", function(e) {
    e.preventDefault();
    $(".popup_new_language_user").fadeIn(200);
  });

  $(".add_new_user_job_profile_btn").on("click", function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(".popup_new_job_user").fadeIn(200);
  });

  // Check PIB Company - Show Second Part Of Form
  $(".btn_check_company_pib").on("click", function(e) {
    e.preventDefault();
    $(".second_part_companies_reg").slideToggle(200);
  });

  // Check
  $('input:radio[name="authorized_person"]').change(function() {
    if (this.checked && this.value == "0") {
      $(".authorized_person_for_contact_company").removeClass("none");
    } else {
      $(".authorized_person_for_contact_company").addClass("none");
    }
  });

  $('input:radio[name="office_out_country"]').change(function() {
    $(".office_out_country_section").removeClass("none");
    if (this.checked && this.value == "1") {
      $(".office_out_country_no").removeClass("none");
      $(".location_comp_reg").addClass("none");
    } else {
      $(".office_out_country_no").addClass("none");
      $(".location_comp_reg").removeClass("none");
    }
  });

  // Success Registration Popup
  $(".loginRegFormSubmitFinal").on("click", function(e) {
    e.preventDefault();
    $(".popup_confirmation_register").fadeIn(200);
  });

  $(".popup_confirmation_register_btn button").on("click", function(e) {
    e.preventDefault();
    $(".popup_confirmation_register").fadeOut(200);
  });

  // Notification Show/Hide Sub Menu
  $(".notification_item_menu_trigger").on("click", function(e) {
    e.preventDefault();
    $(".sub_menu_notification").fadeToggle(200);
  });

  // Business sector form selection

  let bsnArray = [];
  $(".selectSectorSelected > option").each(function() {
    bsnArray.push($(this).val());
  });
  $(".categoriesArray").val(bsnArray);
  $(document).on("click", ".selectSector option", function() {
    let val = $(this).val();
    bsnArray.push(val);

    $(".categoriesArray").val(bsnArray);

    !$(".selectSector option:selected")
      .prop("selected", true)
      .remove()
      .appendTo(".selectSectorSelected");
  });

  $(document).on("click", ".selectSectorSelected option", function() {
    let val = $(this).val();

    let idx = bsnArray.indexOf(val);

    bsnArray.splice(idx, 1);
    $(this)
      .prop("selected", "")
      .remove()
      .appendTo(".selectSector");
    $(".categoriesArray").val(bsnArray);
    !$(".selectSectorSelected option:selected")
      .prop("selected", "")
      .remove()
      .appendTo(".selectSector");
  });

  // End business sector form selection

  // $('#about_us').on('click', function(evt) {
  //   evt.preventDefault();
  //   var about_us = $('#about_us_text').val();
  //     $.ajax
  //     ({
  //         url: 'updateAboutUs',
  //         data: {
  //             about_us: about_us,
  //             '_token': $('meta[name="csrf-token"]').attr('content'),
  //         }
  //         type: 'post',
  //         success: function()
  //         {
  //             return 1;
  //         }
  //     });
  // });

  // $('#about_us_form').submit(function(e) {
  //     e.preventDefault();
  //     var about_us = $('#about_us_text').val();
  //     $.ajax
  //     ({
  //         url: 'updateAboutUs',
  //         data: {
  //             about_us: about_us,
  //             '_token': $('meta[name="csrf-token"]').attr('content'),
  //         }
  //         type: 'post',
  //         success: function()
  //         {
  //             return console.log('123');
  //         }
  //     });
  // });

  // $('button#about_us').click(function(e) {
  //         e.preventDefault();
  //         var about_us = $('#about_us_text').value(),
  //         $.ajax
  //         ({
  //             url: '/updateAboutUs',
  //             data: about_us
  //             type: 'post',
  //             success: function()
  //             {
  //                 return 1;
  //             }
  //         });
  //     });

  $("#about_us_form").submit(function(e) {
    e.preventDefault();
    var about_us = $("#about_us_text").val();
    $("#about_us_text").html(about_us);
    $.ajax({
      url: "/updateAboutUs",
      data: {
        about_us: about_us,
        _token: $('meta[name="csrf-token"]').attr("content")
      },
      type: "post"
    }).done(function() {
      return 1;
    });
  });

  $("#career_form").submit(function(e) {
    e.preventDefault();
    var career = $("#career").val();
    $("#career").html(career);
    $.ajax({
      url: "/updateCareer",
      data: {
        career: career,
        _token: $('meta[name="csrf-token"]').attr("content")
      },
      type: "post"
    }).done(function() {
      return 1;
    });
  });
  $(".job_search_option_triger").click(function(e) {
    e.stopPropagation();
    var targetDisp = $(this).siblings(".options_checkbox");

    if (
      $(".job_search_option_triger")
        .not(this)
        .hasClass("open")
    ) {
      $(".job_search_option_triger").removeClass("open");
      $(".options_checkbox").css("display", "none");
    }
    if (targetDisp.css("display") === "block") {
      targetDisp.css("display", "none");
      $(this).removeClass("open");
    } else {
      $(this)
        .siblings(".options_checkbox")
        .css("display", "none");
      targetDisp.css("display", "block");
      $(this).addClass("open");
    }
  });

  $(window).click(function() {
    $(".options_checkbox").css("display", "none");
    $(".job_search_option_triger").removeClass("open");
    $(".popup_new_job_user").fadeOut(200);
  });
  $(".options_checkbox").click(function(e) {
    e.stopPropagation();
  });
  $(".options_checkbox label").click(function(e) {
    e.stopPropagation();
  });
  $("#description_input").click(function(e) {
    e.stopPropagation();
  });

  $(".add_new_user_job_profile_btn").click(function() {
    $("#new_job_form")
      .find("input[type=text], textarea, select")
      .val("");
  });
  $("#user_skills textarea").click(function(e) {
    e.stopPropagation();
  });

  $(".save_btn_pop_up").click(function() {
    $(".popup_new_job_user").css("display", "none");
  });
  $(".popup_new_job_user").click(function(e) {
    e.stopPropagation();
  });
  $(".languages_multipleSelect").select2();

  $("[data-js=open]").on("click", function() {
    popupOpenClose($(".popup"));
  });

  $("#payment_btn").click(function() {
    $("#payment-form").css("display", "block");
  });
  $(".pop_up_registration_success_btn").click(function() {
    $(".pop_up_registration_success").css("display", "none");
  });
});

function popupOpenClose(popup) {
  /* Add div inside popup for layout if one doesn't exist */
  if ($(".wrapper").length == 0) {
    $(popup).wrapInner("<div class='wrapper'></div>");
  }

  /* Open popup */
  $(popup).show();

  /* Close popup if user clicks on background */
  $(popup).click(function(e) {
    if (e.target == this) {
      if ($(popup).is(":visible")) {
        $(popup).hide();
      }
    }
  });

  /* Close popup and remove errors if user clicks on cancel or close buttons */
  $(popup)
    .find("button[name=close]")
    .on("click", function() {
      if ($(".formElementError").is(":visible")) {
        $(".formElementError").remove();
      }
      $(popup).hide();
    });
}

/* payment blade sliders */

$(function() {
  $("#custom_ammount_btn").click(function() {
    var cena = $("#custom_ammount").val();
    $(".number-1").html(cena + " RSD");
  });
  $(".money-slider").slider({
    range: "min",
    animate: "fast",
    value: 0,
    min: 0,
    max: 10000,
    step: 5,
    slide: function(event, ui) {
      if (ui.value >= 100 && ui.value < 500) {
        $(".number-2").html(ui.value / 10 + " RSD");
        $("#bonus").text("10%");
        $(".money-slider").slider("option", "step", 5);
      } else if (ui.value >= 500 && ui.value < 1000) {
        $(".number-2").html((ui.value / 100) * 15 + " RSD");
        $("#bonus").text("15%");
        $(".money-slider").slider("option", "step", 50);
      } else if (ui.value >= 1000 && ui.value < 2000) {
        $(".number-2").html(ui.value / 5 + " RSD");
        $("#bonus").text("20%");
        $(".money-slider").slider("option", "step", 50);
      } else if (ui.value >= 2000 && ui.value < 3000) {
        $(".number-2").html(ui.value / 4 + " RSD");
        $("#bonus").text("25%");
        $(".money-slider").slider("option", "step", 100);
      } else if (ui.value >= 3000 && ui.value < 4000) {
        $(".number-2").html((ui.value / 100) * 30 + " RSD");
        $("#bonus").text("30%");
        $(".money-slider").slider("option", "step", 100);
      } else if (ui.value >= 4000 && ui.value < 5000) {
        $(".number-2").html((ui.value / 100) * 40 + " RSD");
        $("#bonus").text("40%");
        $(".money-slider").slider("option", "step", 100);
      } else if (ui.value >= 5000 && ui.value <= 10000) {
        $(".number-2").html(ui.value / 2 + " RSD");
        $("#bonus").text("50%");
        $(".money-slider").slider("option", "step", 100);
      } else {
        $(".number-2").html("0");
        $("#bonus").text("0%");
        $(".money-slider").slider("option", "step", 1);
      }
      var bonus = $(".number-2")
        .text()
        .replace(" RSD", "");
      $(".number-1").html(ui.value + " RSD");
      var cenaUValuti = ui.value - bonus + " RSD";
      var cena = ui.value - bonus;
      $("#total_amount_btn").html(cenaUValuti);
      $(".sub_amount").html(cenaUValuti);
      $("#hidden_ammount").val(cena);
    }
  });
});
