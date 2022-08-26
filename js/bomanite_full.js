/// <reference path="../../../../wp-includes/js/jquery/jquery.js" />

//CHANGES to this this file > CHANGE the version in the enqueue AND the register
jQuery(document).ready(function ($) {
    QueenOfTheWorkaround = {
        Creator: 'Ramona Eid',
        Supporter: 'Tara Kincade'
    }

    // On HomePage correct Google Maps Easy AutoScroll to Map - 3700 milliseconds
    // if (window.location.pathname === '/') {
    //     //https://developer.mozilla.org/en-US/docs/Web/API/Window/scrollTo#examples
    //     setTimeout(function() {window.scrollTo({
    //         top: 0,
    //         left: 0,
    //         behavior: 'smooth'
    //     });},3700);
    // }

    if (bomanite_options.pagetitle && bomanite_options.landingpage) {
        if (bomanite_options.landingpage.replace(/'/g, "") === bomanite_options.pagetitle.replace(/'/g, "")) {
            var headerIcon = "ui-icon-plus";
            var activeHeaderIcon = "ui-icon-minus";
            var accordion;
            var head;
            var content;
            var website = jQuery.trim(jQuery('#bomanite_website a').text());
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
                'Bastian Concrete Construction, LLC',
                'Connecticut Bomanite Systems',
                'Minnesota',
                'Maryland',
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
                if ( (bomanite_options.landingpage === "Minnesota") || (bomanite_options.landingpage === "Maryland") ) {
                    if ( (bomanite_options.landingpage === "Minnesota") ) {
                        networkHTML += '<h3 class="network">***</h3>';
                    }
                    if ( (bomanite_options.landingpage === "Maryland") ) {
                        networkHTML += '<h3 class="network">Bomanite is looking for Licensees in the Maryland area!</h3>';
                        networkHTML += '<h3 class="network">Please contact us at: <a href="http://' + website + '" target="_blank">' + website + '</a></h3>';
                    }
                } else {
                    networkHTML += '<h3 class="network">This MicroSite is part of the Bomanite<sup>®</sup> Dealer Network</h3>';
                }
            } else {
                // remove leading and trailing spaces
                networkHTML += '<h3 class="network">This MicroSite is part of the Bomanite<sup>®</sup> Dealer Network and not the Official Website of the Licensee</h3>';
                networkHTML += '<h3 class="network">Official Licensee Website: <a href="http://' + website + '" target="_blank">' + website + '</a></h3>';
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

            // Accessibility of hidden H3
            $.each(jQuery('div.hidden-accordion h3'), function (i) {
                jQuery(this).attr('aria-hidden', true);
                jQuery(this).append('<span class="sr-only">Screen Reader</span>')
            });

        }
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
    //https://stackoverflow.com/questions/39020871/anchor-tag-in-drop-down
    var galleryDropdown = document.getElementById("galleryDropdown");
    if (galleryDropdown) {
        galleryDropdown.onchange = function() {
            if (this.selectedIndex !== 0) {
                window.location.href = this.value;
                this.selectedIndex = 0;
            }
        };
    }

    // Accessibility of menu fontawesome icons
    $.each(jQuery('li.menu-item a i'), function (i) {
        if(jQuery(this).hasClass('ramona-facebook')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Facebook in another tab.');
        } else if(jQuery(this).hasClass('ramona-twitter')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Twitter in another tab.');
        } else if(jQuery(this).hasClass('ramona-houzz')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Houzz in another tab.');
        } else if(jQuery(this).hasClass('ramona-pinterest')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Pinterest in another tab.');
        } else if(jQuery(this).hasClass('ramona-instagram')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Instagram in another tab.');
        } else if(jQuery(this).hasClass('ramona-youtube')) {
            jQuery(this).parent('a').attr('aria-label', 'Open YouTube in another tab.');
        } else if(jQuery(this).hasClass('ramona-yelp')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Yelp in another tab.');
        } else if(jQuery(this).hasClass('ramona-linkedin')) {
            jQuery(this).parent('a').attr('aria-label', 'Open LinkedIn in another tab.');
        }  else if(jQuery(this).hasClass('ramona-blogspot')) {
            jQuery(this).parent('a').attr('aria-label', 'Open Blogspot in another tab.');
        } else {
            // do nothing
        }

    });

});