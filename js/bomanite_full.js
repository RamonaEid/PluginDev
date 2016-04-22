/// <reference path="../../../../wp-includes/js/jquery/jquery.js" />

//CHANGES to this this file > CHANGE the version in the enqueue AND the register
jQuery(document).ready(function ($) {
    QueenOfTheWorkaround = {
        Creator: 'Ramona Eid',
        Supporter: 'Tara Dunn'
    }

    var cleantitle = encodeURI(jQuery('h1.entry-title').text()).replace(/%E2%80%99/g, "");
    cleantitle = decodeURI(cleantitle);
    var bomaniteOptionsLandingpage = bomanite_options.landingpage;
    bomaniteOptionsLandingpage = bomaniteOptionsLandingpage.replace(/'/g, "");

    //jQuery('h1.entry-title').text() === bomanite_options.landingpage
    if (cleantitle === bomaniteOptionsLandingpage) {
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
            '#bomanite_numberstartyearofbusiness',
            '#bomanite_bomanitelicensee',
            '#bomanite_numberofemployees',
            '#bomanite_keyemployeesandqualifications',
            '#bomanite_unions',
            '#bomanite_contractorlicensenumbers',
            '#bomanite_bomanitelicenseesince',
            '#bomanite_leedaccredited',
            '#bomanite_minprojectsize',
            '#bomanite_typeofwork',
            '#bomanite_onsiteshowroom',
            '#bomanite_aiaaccreditedshowroom',
            '#bomanite_samplesanddisplaysviewable',
            '#bomanite_showroomhours',
            '#bomanite_otherinfo',
            '#bomanite_showroomaddress'
        ];
        var nonwebsites = [
            'Bomanite of Oklahoma',
            'Bomanite of Atlanta',
            'Shepherd\'s Construction Company, Inc.',
            'whatever'
        ];
        var omitwebsite = false;
        var networkHTML = '';

        // Omit Official Licensee Website
        $.each(nonwebsites, function (i) {
            if (nonwebsites[i] === bomanite_options.landingpage) {
                omitwebsite = true;
                // break out of the loop
                return false;
            }
        });
        // Prepend Dealer Network verbiage to Title of the page
        if (omitwebsite) {
            networkHTML += '<h3 class="network">This MicroSite is part of the Bomanite<sup>®</sup> Dealer Network</h3>';
        } else {
            // remove leading and trailing spaces
            var website = jQuery.trim(jQuery('#bomanite_website a').text());
            networkHTML += '<h3 class="network">This MicroSite is part of the Bomanite<sup>®</sup> Dealer Network and not the Offical Website of the Licensee</h3>';
            networkHTML += '<h3 class="network">Offical Licensee Website: <a href="http://' + website + '" target="_blank">' + website + '</a></h3>';
        }
        $('h1.entry-title').before(networkHTML);

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