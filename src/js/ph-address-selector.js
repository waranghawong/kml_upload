/**
 * __________________________________________________________________
 *
 * Phillipine Address Selector
 * __________________________________________________________________
 *
 * MIT License
 * 
 * Copyright (c) 2020 Wilfred V. Pine
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package Phillipine Address Selector
 * @author Wilfred V. Pine <only.master.red@gmail.com>
 * @copyright Copyright 2020 (https://dev.confired.com)
 * @link https://github.com/redmalmon/philippine-address-selector
 * @license https://opensource.org/licenses/MIT MIT License
 */

var my_handlers = {
    // fill province
    fill_provinces: function() {
        //selected region
        var region_code = $(this).val();

        // set selected text to input
        var region_text = $(this).find("option:selected").text();
        var region_text1 = $(this).find("option:selected").text();
        var rmd_region = $(this).find("option:selected").text();
        var selector_region = $(this).find("option:selected").text();
        var tol_region = $(this).find("option:selected").text();

        let region_input = $('#region-text');
        let region_input1 = $('#region-text1');
        let rmd_region_input = $('#edit-region-text');
        let selector_region_input = $('#selector-region-text');
        let tol_region_input = $('#tol-region-text');

        region_input.val(region_text);
        region_input1.val(region_text1);
        rmd_region_input.val(rmd_region);
        selector_region_input.val(selector_region);
        tol_region_input.val(tol_region);

        //clear province & city & barangay input
        $('#province-text').val('');
        $('#city-text').val('');
        $('#barangay-text').val('');

        $('#province-text1').val('');
        $('#city-text1').val('');
        $('#barangay-text1').val('');
        
        $('#edit-province-text').val('');
        $('#edit-city-text').val('');
        $('#edit-barangay-text').val('');

        $('#selector-province-text').val('');
        $('#selector-city-text').val('');
        $('#selector-barangay-text').val('');

        $('#tol-province-text').val('');
        $('#tol-city-text').val('');
        $('#tol-barangay-text').val('');

        //province
        let dropdown = $('#province');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        dropdown.prop('selectedIndex', 0);

         //province1
         let dropdown1 = $('#province1');
         dropdown1.empty();
         dropdown1.append('<option selected="true" disabled>Choose State/Province</option>');
         dropdown1.prop('selectedIndex', 0);

        //rmd_province
        let rmd_dropdown = $('#rmd_province');
        rmd_dropdown.empty();
        rmd_dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        rmd_dropdown.prop('selectedIndex', 0);

        //selector_province
        let selector_dropdown = $('#selector_province');
        selector_dropdown.empty();
        selector_dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        selector_dropdown.prop('selectedIndex', 0);

        //tol_province
        let tol_dropdown = $('#tol_province');
        tol_dropdown.empty();
        tol_dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
        tol_dropdown.prop('selectedIndex', 0);

        //city
        let city = $('#city');
        city.empty();
        city.append('<option selected="true" disabled></option>');
        city.prop('selectedIndex', 0);

         //city1
         let city1 = $('#city1');
         city1.empty();
         city1.append('<option selected="true" disabled></option>');
         city1.prop('selectedIndex', 0);

        //rmd_city
        let rmd_city = $('#rmd_city');
        rmd_city.empty();
        rmd_city.append('<option selected="true" disabled></option>');
        rmd_city.prop('selectedIndex', 0);

        //selector_city
        let selector_city = $('#selector_city');
        selector_city.empty();
        selector_city.append('<option selected="true" disabled></option>');
        selector_city.prop('selectedIndex', 0);

        //tol_city
        let tol_city = $('#tol_city');
        tol_city.empty();
        tol_city.append('<option selected="true" disabled></option>');
        tol_city.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled></option>');
        barangay.prop('selectedIndex', 0);

        //barangay1
        let barangay1 = $('#barangay1');
        barangay1.empty();
        barangay1.append('<option selected="true" disabled></option>');
        barangay1.prop('selectedIndex', 0);

        //rmd_barangay
        let rmd_barangay = $('#rmd_barangay');
        rmd_barangay.empty();
        rmd_barangay.append('<option selected="true" disabled></option>');
        rmd_barangay.prop('selectedIndex', 0);

        //selector_barangay
        let selector_barangay = $('#selector_barangay');
        selector_barangay.empty();
        selector_barangay.append('<option selected="true" disabled></option>');
        selector_barangay.prop('selectedIndex', 0);

        //tol_barangay
        let tol_barangay = $('#tol_barangay');
        tol_barangay.empty();
        tol_barangay.append('<option selected="true" disabled></option>');
        tol_barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = '../src/ph-json/province.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.region_code == region_code;
            });

            result.sort(function(a, b) {
                return a.province_name.localeCompare(b.province_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                dropdown1.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                rmd_dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                selector_dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                tol_dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
            })

        });
    },
    // fill city
    fill_cities: function() {
        //selected province
        var province_code = $(this).val();

        // set selected text to input
        var province_text = $(this).find("option:selected").text();
        var province_text1 = $(this).find("option:selected").text();
        let province_input = $('#province-text');
        let province_input1 = $('#province-text1');
        let rmd_province = $('#edit-province-text');
        let selector_province = $('#selector-province-text');
        let tol_province = $('#tol-province-text');

        province_input.val(province_text);
        province_input1.val(province_text1);
        rmd_province.val(province_text1);
        selector_province.val(province_text1);
        tol_province.val(province_text);

        //clear city & barangay input
        $('#city-text').val('');
        $('#barangay-text').val('');

        $('#city-text1').val('');
        $('#barangay-text1').val('');

        $('#edit-city-text').val('');
        $('#edit-barangay-text').val('');

        
        $('#selector-city-text').val('');
        $('#selector-barangay-text').val('');

        $('#tol-city-text').val('');
        $('#tol-barangay-text').val('');

        //city
        let dropdown = $('#city');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
        dropdown.prop('selectedIndex', 0);

        //city1
        let dropdown1 = $('#city1');
        dropdown1.empty();
        dropdown1.append('<option selected="true" disabled>Choose city/municipality</option>');
        dropdown1.prop('selectedIndex', 0);

        //city_rmd
        let rmd_city = $('#rmd_city');
        rmd_city.empty();
        rmd_city.append('<option selected="true" disabled>Choose city/municipality</option>');
        rmd_city.prop('selectedIndex', 0);

        //city_selector
        let selector_city = $('#selector_city');
        selector_city.empty();
        selector_city.append('<option selected="true" disabled>Choose city/municipality</option>');
        selector_city.prop('selectedIndex', 0);

        //city_tol
        let tol_city = $('#tol_city');
        tol_city.empty();
        tol_city.append('<option selected="true" disabled>Choose city/municipality</option>');
        tol_city.prop('selectedIndex', 0);

        //barangay
        let barangay = $('#barangay');
        barangay.empty();
        barangay.append('<option selected="true" disabled></option>');
        barangay.prop('selectedIndex', 0);

        //barangay1
        let barangay1 = $('#barangay1');
        barangay1.empty();
        barangay1.append('<option selected="true" disabled></option>');
        barangay1.prop('selectedIndex', 0);

        //rmd_barangay1
        let rmd_barangay = $('#rmd_barangay');
        rmd_barangay.empty();
        rmd_barangay.append('<option selected="true" disabled></option>');
        rmd_barangay.prop('selectedIndex', 0);

        //selector_barangay1
        let selector_barangay = $('#selector_barangay');
        selector_barangay.empty();
        selector_barangay.append('<option selected="true" disabled></option>');
        selector_barangay.prop('selectedIndex', 0);

        //selector_barangay1
        let tol_barangay = $('#tol_barangay');
        tol_barangay.empty();
        tol_barangay.append('<option selected="true" disabled></option>');
        tol_barangay.prop('selectedIndex', 0);

        // filter & fill
        var url = '../src/ph-json/city.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.province_code == province_code;
            });

            result.sort(function(a, b) {
                return a.city_name.localeCompare(b.city_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                dropdown1.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                rmd_city.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                selector_city.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                tol_city.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
            })

        });
    },
    // fill barangay
    fill_barangays: function() {
        // selected barangay
        var city_code = $(this).val();

        // set selected text to input
        var city_text = $(this).find("option:selected").text();
        let city_input = $('#city-text');
        let city_input1 = $('#city-text1');
        let rmd_city = $('#edit-city-text');
        let selector_city = $('#selector-city-text');
        let tol_city = $('#tol-city-text');

        city_input.val(city_text);
        city_input1.val(city_text);
        rmd_city.val(city_text);
        selector_city.val(city_text);
        tol_city.val(city_text);

        //clear barangay input
        $('#barangay-text').val('');
        $('#barangay-text1').val('');
        $('#edit-barangay-text').val('');
        $('#selector-barangay-text').val('');
        $('#tol-barangay-text').val('');

        // barangay
        let dropdown = $('#barangay');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose barangay</option>');
        dropdown.prop('selectedIndex', 0);

        // barangay
        let dropdown1 = $('#barangay1');
        dropdown1.empty();
        dropdown1.append('<option selected="true" disabled>Choose barangay</option>');
        dropdown1.prop('selectedIndex', 0);

        // rmd baramgay
        let rmd_barangay = $('#rmd_barangay');
        rmd_barangay.empty();
        rmd_barangay.append('<option selected="true" disabled>Choose barangay</option>');
        rmd_barangay.prop('selectedIndex', 0);

        // selector barangay
        let selector_barangay = $('#selector_barangay');
        selector_barangay.empty();
        selector_barangay.append('<option selected="true" disabled>Choose barangay</option>');
        selector_barangay.prop('selectedIndex', 0);

        // selector barangay
        let tol_barangay = $('#tol_barangay');
        tol_barangay.empty();
        tol_barangay.append('<option selected="true" disabled>Choose barangay</option>');
        tol_barangay.prop('selectedIndex', 0);

        // filter & Fill
        var url = '../src/ph-json/barangay.json';
        $.getJSON(url, function(data) {
            var result = data.filter(function(value) {
                return value.city_code == city_code;
            });

            result.sort(function(a, b) {
                return a.brgy_name.localeCompare(b.brgy_name);
            });

            $.each(result, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                dropdown1.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                rmd_barangay.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                selector_barangay.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                tol_barangay.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
            })

        });
    },

    onchange_barangay: function() {
        // set selected text to input
        var barangay_text = $(this).find("option:selected").text();
        let barangay_input = $('#barangay-text');
        let barangay_input1 = $('#barangay-text1');
        let rmd_barangay_input1 = $('#edit-barangay-text');
        let selector_barangay_input = $('#selector-barangay-text');
        let tol_barangay_input = $('#tol-barangay-text');

        barangay_input.val(barangay_text);
        barangay_input1.val(barangay_text);
        rmd_barangay_input1.val(barangay_text);
        selector_barangay_input.val(barangay_text);
        tol_barangay_input.val(barangay_text);
    },

};


$(function() {
    // events
    $('#region').on('change', my_handlers.fill_provinces);
    $('#province').on('change', my_handlers.fill_cities);
    $('#city').on('change', my_handlers.fill_barangays);
    $('#barangay').on('change', my_handlers.onchange_barangay);

    // load region
    let dropdown = $('#region');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Region</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../src/ph-json/region.json';
    // Populate dropdown with list of regions
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
    });

});

$(function() {
    // events
    $('#region1').on('change', my_handlers.fill_provinces);
    $('#province1').on('change', my_handlers.fill_cities);
    $('#city1').on('change', my_handlers.fill_barangays);
    $('#barangay1').on('change', my_handlers.onchange_barangay);

    // load region
    let dropdown = $('#region1');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Region</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../src/ph-json/region.json';
    // Populate dropdown with list of regions
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
    });

});

$(function() {
    // events
    $('#rmd_region').on('change', my_handlers.fill_provinces);
    $('#rmd_province').on('change', my_handlers.fill_cities);
    $('#rmd_city').on('change', my_handlers.fill_barangays);
    $('#rmd_barangay').on('change', my_handlers.onchange_barangay);

    // load region
    let dropdown = $('#rmd_region');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Region</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../src/ph-json/region.json';
    // Populate dropdown with list of regions
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
    });

});

$(function() {
    // events
    $('#selector_region').on('change', my_handlers.fill_provinces);
    $('#selector_province').on('change', my_handlers.fill_cities);
    $('#selector_city').on('change', my_handlers.fill_barangays);
    $('#selector_barangay').on('change', my_handlers.onchange_barangay);

    // load region
    let dropdown = $('#selector_region');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Region</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../src/ph-json/region.json';
    // Populate dropdown with list of regions
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
    });

});

$(function() {
    // events
    $('#tol_region').on('change', my_handlers.fill_provinces);
    $('#tol_province').on('change', my_handlers.fill_cities);
    $('#tol_city').on('change', my_handlers.fill_barangays);
    $('#tol_barangay').on('change', my_handlers.onchange_barangay);

    // load region
    let dropdown = $('#tol_region');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Choose Region</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../src/ph-json/region.json';
    // Populate dropdown with list of regions
    $.getJSON(url, function(data) {
        $.each(data, function(key, entry) {
            dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
        })
    });

});