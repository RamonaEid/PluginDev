﻿/// <reference path="../../../../wp-includes/js/jquery/jquery.js" />

//CHANGES to this this file > CHANGE the version in the enqueue AND the register
jQuery(document).ready(function ($) {
    QueenOfTheWorkaround = {
        Creator: 'Ramona Eid',
        Supporter: 'Tara Dunn'
    }

    if (jQuery('h1.entry-title').text() === bomanite_options.landingpage) {
        var headerIcon = "ui-icon-plus";
        var activeHeaderIcon = "ui-icon-minus";
        var accordion;
        var head;
        var content;
        var ids = [
            '#bomanite_phone',
            '#bomanite_email',
            '#bomanite_website',
            '#bomanite_mailing',
            '#bomanite_qualification',
            '#bomanite_departmentheads',
            '#bomanite_services',
            '#bomanite_bonding',
            '#bomanite_samplepolicy',
            '#bomanite_freeestimates',
            '#bomanite_continuingeducation',
            '#bomanite_geographicservicearea',
            '#bomanite_numberofyearsinbusiness',
            '#bomanite_bomanitelicensee',
            '#bomanite_numberofemployees',
            '#bomanite_keyemployeesandqualifications',
            '#bomanite_onsiteshowroom',
            '#bomanite_ataaccreditedshowroom',
            '#bomanite_samplesanddisplaysviewable',
            '#bomanite_showroomhours',
            '#bomanite_otherinfo',
            '#bomanite_showroomaddress'
        ];
        // Change the Styling of the Title of the page
        if ($('#bomanite_phone').length > 0) {
            $('h1.entry-title').css({
                "text-align": "center",
                "padding": "0.25em 0.5em",
                "border-top": "0.05em solid #999",
                "border-bottom": "0.05em solid #999",
                "margin-bottom": "1em"
            });
        };
        // Create Accordion, collapse accordingly
        function CollapseAccordion(accordion, head, content) {
            $(accordion).accordion("option", "collapsible", true);
            $(accordion).accordion("option", "active", false);
            $(accordion).addClass('hidden-accordion');
            $(head).unbind("click");
            $(head).text("");
            $(content).text("");
            $(head).css({ "padding": "0px" });
        };
        $.each(ids, function (i) {
            $(ids[i]).accordion({
                icons: { "header": headerIcon, "activeHeader": activeHeaderIcon }
            });
            if ($(ids[i] + ' div.ui-accordion-content').text() == 'na') {
                accordion = $(ids[i]);
                head = $(ids[i] + ' h3');
                content = $(ids[i] + ' div.ui-accordion-content');
                CollapseAccordion(accordion, head, content);
            }
        });

        // Collapse empty rows
        $.each(jQuery('.row'), function (i) {
            var columns = jQuery(this).children('.grid-parent').children('div[class^="grid-"]');
            var columnNumber = jQuery(columns).length;
            var hiddenColumnNumber = 0;
            var accordions = 0;
            var hiddenAccordions = 0;
            $.each(columns, function () {
                accordions = jQuery(this).children('.ui-accordion').length;
                hiddenAccordions = jQuery(this).children('.hidden-accordion').length;
                if (accordions == hiddenAccordions) {
                    hiddenColumnNumber++;
                }
            });
            if (columnNumber == hiddenColumnNumber) {
                jQuery(this).hide();
            }
        });

    }

    // Gallery
    $.each(jQuery('div.gallery'), function (i) {
        var items = jQuery(this).find('li');
        //var wGal = items.has('img');
        var woGal = items.not(items.has('img')).hide();
        if (woGal.length == items.length) {
            jQuery(this).hide();
        }
    });

});