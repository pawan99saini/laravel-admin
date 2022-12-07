<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>Admin</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('demo1/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
     <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('demo1/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('demo1/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('demo1/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--end::Global Stylesheets Bundle-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('demo1/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('demo1/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('demo1/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js" type="text/javascript"></script>

    <!--end::Global Javascript Bundle-->
    <style>
       .datepicker {
  width: 265px;
  padding: 10px;
  border-radius: 0.42rem;
}
.datepicker.datepicker-orient-top {
  margin-top: 8px;
}
.datepicker table {
  width: 100%;
}
.datepicker td,
.datepicker th {
  font-size: 1rem;
  font-weight: regular;
  width: 33px;
  height: 33px;
  border-radius: 0.42rem;
}
.datepicker thead th {
  color: #3F4254;
}
.datepicker thead th.prev, .datepicker thead th.datepicker-switch, .datepicker thead th.next {
  font-weight: 500;
  color: #3F4254;
}
.datepicker thead th.prev i, .datepicker thead th.datepicker-switch i, .datepicker thead th.next i {
  font-size: 1.2rem;
  color: #7E8299;
}
.datepicker thead th.prev i:before, .datepicker thead th.datepicker-switch i:before, .datepicker thead th.next i:before {
  line-height: 0;
  vertical-align: middle;
}
.datepicker thead th.prev:hover, .datepicker thead th.datepicker-switch:hover, .datepicker thead th.next:hover {
  background: #F3F6F9 !important;
}
.datepicker thead th.dow {
  color: #3F4254;
  font-weight: 600;
}
.datepicker tbody tr > td {
  width: 35px;
  height: 35px;
}
.datepicker tbody tr > td.day {
  color: #7E8299;
  font-weight: 400;
}
.datepicker tbody tr > td.day:hover {
  background: #F3F6F9;
  color: #3F4254;
}
.datepicker tbody tr > td.day.old {
  color: #7E8299;
}
.datepicker tbody tr > td.day.new {
  color: #3F4254;
}
.datepicker tbody tr > td.day.selected, .datepicker tbody tr > td.day.selected:hover, .datepicker tbody tr > td.day.active, .datepicker tbody tr > td.day.active:hover {
  background: #3699FF;
  color: #ffffff;
}
.datepicker tbody tr > td.day.today {
  position: relative;
  background: #E1F0FF !important;
  color: #3699FF !important;
}
.datepicker tbody tr > td.day.today:before {
  content: "";
  display: inline-block;
  border: solid transparent;
  border-width: 0 0 7px 7px;
  border-bottom-color: #3699FF;
  border-top-color: #3699FF;
  position: absolute;
  bottom: 4px;
  right: 4px;
}
.datepicker tbody tr > td.day.range {
  background: #F3F6F9;
}
.datepicker tbody tr > td span.year,
.datepicker tbody tr > td span.hour,
.datepicker tbody tr > td span.minute,
.datepicker tbody tr > td span.month {
  color: #7E8299;
}
.datepicker tbody tr > td span.year:hover,
.datepicker tbody tr > td span.hour:hover,
.datepicker tbody tr > td span.minute:hover,
.datepicker tbody tr > td span.month:hover {
  background: #F3F6F9;
}
.datepicker tbody tr > td span.year.focused, .datepicker tbody tr > td span.year.focused:hover, .datepicker tbody tr > td span.year.active:hover, .datepicker tbody tr > td span.year.active.focused:hover, .datepicker tbody tr > td span.year.active,
.datepicker tbody tr > td span.hour.focused,
.datepicker tbody tr > td span.hour.focused:hover,
.datepicker tbody tr > td span.hour.active:hover,
.datepicker tbody tr > td span.hour.active.focused:hover,
.datepicker tbody tr > td span.hour.active,
.datepicker tbody tr > td span.minute.focused,
.datepicker tbody tr > td span.minute.focused:hover,
.datepicker tbody tr > td span.minute.active:hover,
.datepicker tbody tr > td span.minute.active.focused:hover,
.datepicker tbody tr > td span.minute.active,
.datepicker tbody tr > td span.month.focused,
.datepicker tbody tr > td span.month.focused:hover,
.datepicker tbody tr > td span.month.active:hover,
.datepicker tbody tr > td span.month.active.focused:hover,
.datepicker tbody tr > td span.month.active {
  background: #3699FF;
  color: #ffffff;
}
.datepicker tfoot tr > th {
  width: 35px;
  height: 35px;
}
.datepicker tfoot tr > th.today, .datepicker tfoot tr > th.clear {
  border-radius: 0.42rem;
  font-weight: 500;
}
.datepicker tfoot tr > th.today:hover, .datepicker tfoot tr > th.clear:hover {
  background: #EBEDF3;
}
.datepicker.datepicker-inline {
  border: 1px solid #EBEDF3;
}

.input-daterange .input-group-addon {
  min-width: 44px;
}
.input-daterange input {
  text-align: left;
}
.input-daterange .input-group-append .input-group-text {
  border-right: 0;
}

.daterangepicker {
  padding: 0;
  margin: 0;
  width: auto;
  -webkit-box-shadow: 0px 0px 50px 0px rgba(82, 63, 105, 0.15);
  box-shadow: 0px 0px 50px 0px rgba(82, 63, 105, 0.15);
  border-radius: 0.42rem;
  border: 0;
  font-family: Poppins, Helvetica, "sans-serif";
  z-index: 96;
}
.modal-open .daterangepicker {
  z-index: 1051;
}
.daterangepicker:after, .daterangepicker:before {
  display: none;
}
.daterangepicker .ranges ul {
  padding: 1rem 0;
  width: 175px;
}
.daterangepicker .ranges li {
  padding: 0.7rem 1.75rem;
  font-weight: 500;
  font-size: 1rem;
  color: #7E8299;
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
}
.daterangepicker .ranges li:hover, .daterangepicker .ranges li.active {
  background-color: #F3F6F9;
  color: #3699FF;
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
}
.daterangepicker.show-calendar .ranges {
  border-right: 1px solid #EBEDF3;
  margin-top: 0;
  height: 297px;
}
.daterangepicker.show-ranges .drp-calendar.left {
  border-left: 0;
}
.daterangepicker .drp-buttons {
  padding: 1rem 1.75rem;
  border-top: 1px solid #EBEDF3;
}
.daterangepicker .drp-buttons .btn {
  font-size: 0.9rem;
  font-weight: 500;
  padding: 0.5rem 1rem;
  border-radius: 0.42rem;
}
.daterangepicker .drp-selected {
  font-size: 0.9rem;
}
.daterangepicker .drp-calendar.left, .daterangepicker .drp-calendar.right {
  padding: 1rem 1rem;
}
.daterangepicker .drp-calendar.left {
  border-left: 0 !important;
}
.daterangepicker .drp-calendar th,
.daterangepicker .drp-calendar td {
  font-size: 1rem;
  font-weight: regular;
  width: 33px;
  height: 33px;
}
.daterangepicker .drp-calendar th {
  font-weight: 500;
  color: #3F4254;
}
.daterangepicker .drp-calendar th.month {
  font-weight: 500;
  color: #3F4254;
}
.daterangepicker .drp-calendar th.next span, .daterangepicker .drp-calendar th.prev span {
  border-width: 0 1px 1px 0;
  border-color: #7E8299;
}
.daterangepicker .drp-calendar th.next span {
  margin-right: 1px;
}
.daterangepicker .drp-calendar th.prev span {
  margin-left: 1px;
}
.daterangepicker .drp-calendar td {
  color: #7E8299;
}
.daterangepicker .drp-calendar td:hover {
  background-color: #F3F6F9;
}
.daterangepicker .drp-calendar td.available.off {
  color: #B5B5C3;
}
.daterangepicker .drp-calendar td.active {
  background-color: #3699FF !important;
  color: #FFFFFF !important;
  border-radius: 0.42rem;
}
.daterangepicker .drp-calendar td.active.start-date {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.daterangepicker .drp-calendar td.active.end-date {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.daterangepicker .drp-calendar td.active.start-date.end-date {
  border-radius: 0.42rem;
}
.daterangepicker .drp-calendar td.today, .daterangepicker .drp-calendar td.today.active {
  border-radius: 0.42rem;
  background: rgba(54, 153, 255, 0.12) !important;
  color: #3699FF !important;
}
.daterangepicker .drp-calendar td.in-range.available:not(.active):not(.off):not(.today) {
  background-color: #F3F6F9;
  color: #3F4254;
}
.daterangepicker select {
  border-radius: 0.42rem;
  background: transparent !important;
  border-color: #E4E6EF !important;
  color: #3F4254 !important;
}

@media (min-width: 730px) {
  .daterangepicker.show-calendar .ranges {
    height: 297px !important;
  }
}
@media (max-width: 767.98px) {
  .daterangepicker.show-calendar .ranges {
    height: 245px;
  }
}
.bootstrap-datetimepicker-widget {
  border: 1px solid #EBEDF3;
  border-radius: 0.42rem;
}
.bootstrap-datetimepicker-widget.dropdown-menu {
  border: 0;
  width: 265px !important;
  padding: 0;
}
.bootstrap-datetimepicker-widget .datepicker {
  width: 100%;
  padding: 10px;
}
.bootstrap-datetimepicker-widget .datepicker table {
  width: 100%;
}
.bootstrap-datetimepicker-widget .datepicker table thead th {
  display: table-cell;
}
.bootstrap-datetimepicker-widget .datepicker table thead th.picker-switch {
  color: #3F4254;
  font-weight: 500;
  display: table-cell;
  font-size: 1rem;
}
.bootstrap-datetimepicker-widget .datepicker table thead th.picker-switch:hover {
  color: #3699FF;
  background: #F3F6F9 !important;
}
.bootstrap-datetimepicker-widget .datepicker table thead th.prev span, .bootstrap-datetimepicker-widget .datepicker table thead th.next span {
  font-size: 0.8rem;
  color: #7E8299;
}
.bootstrap-datetimepicker-widget .datepicker table thead th.prev:hover span, .bootstrap-datetimepicker-widget .datepicker table thead th.next:hover span {
  color: #3699FF;
}
.bootstrap-datetimepicker-widget .datepicker table thead th.disabled {
  color: #B5B5C3;
  cursor: not-allowed;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tr td,
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tr th {
  font-size: 1rem;
  width: 35px;
  height: 35px;
  padding: 0;
  font-weight: regular;
  vertical-align: middle;
  text-align: center;
  border-radius: 0.42rem;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td {
  color: #7E8299;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td:hover {
  background: #F3F6F9;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.old {
  color: #7E8299;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.new {
  color: #3F4254;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td:focus, .bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.active {
  background: #3699FF !important;
  color: #ffffff !important;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.selected {
  background: #E1F0FF;
  color: #3699FF;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.disabled {
  color: #B5B5C3;
  cursor: not-allowed;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.today {
  position: relative;
  background: #E1F0FF !important;
  color: #3699FF !important;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-days table tbody tr > td.today:before {
  content: "";
  display: inline-block;
  border: solid transparent;
  border-width: 0 0 7px 7px;
  border-bottom-color: #3699FF;
  border-top-color: #3699FF;
  position: absolute;
  bottom: 4px;
  right: 4px;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th {
  font-size: 1rem;
  width: 35px;
  height: 35px;
  padding: 0;
  font-weight: regular;
  vertical-align: middle;
  text-align: center;
  border-radius: 0.42rem;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span {
  color: #7E8299;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span:hover,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span:hover,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span:hover,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span:hover,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span:hover,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span:hover {
  background: #F3F6F9;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.old,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.old,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.old,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.old,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.old,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.old {
  color: #7E8299;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.new,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.new,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.new,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.new,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.new,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.new {
  color: #3F4254;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span:focus, .bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.active,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span:focus,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.active,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span:focus,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.active,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span:focus,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.active,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span:focus,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.active,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span:focus,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.active {
  background: #3699FF !important;
  color: #ffffff !important;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.selected,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.selected,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.selected,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.selected,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.selected,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.selected {
  background: #E1F0FF;
  color: #3699FF;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.today,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.today,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.today,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.today,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.today,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.today {
  position: relative;
  background: #E1F0FF !important;
  color: #3699FF !important;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.today:before,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.today:before,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.today:before,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.today:before,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.today:before,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.today:before {
  content: "";
  display: inline-block;
  border: solid transparent;
  border-width: 0 0 7px 7px;
  border-bottom-color: #3699FF !important;
  border-top-color: #3699FF !important;
  position: absolute;
  bottom: 4px;
  right: 4px;
}
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr td span.disabled,
.bootstrap-datetimepicker-widget .datepicker .datepicker-months table tr th span.disabled,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr td span.disabled,
.bootstrap-datetimepicker-widget .datepicker .datepicker-years table tr th span.disabled,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr td span.disabled,
.bootstrap-datetimepicker-widget .datepicker .datepicker-decades table tr th span.disabled {
  color: #B5B5C3;
  cursor: not-allowed;
}

/*!
 * Datepicker for Bootstrap v1.9.0 (https://github.com/uxsolutions/bootstrap-datepicker)
 *
 * Licensed under the Apache License v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 */
.datepicker {
  border-radius: 4px;
  direction: ltr;
}

.datepicker-inline {
  width: 220px;
}

.datepicker-rtl {
  direction: rtl;
}

.datepicker-rtl.dropdown-menu {
  left: auto;
}

.datepicker-rtl table tr td span {
  float: right;
}

.datepicker-dropdown {
  top: 0;
  left: 0;
  padding: 4px;
}

.datepicker-dropdown:before {
  content: "";
  display: inline-block;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  border-bottom: 7px solid rgba(0, 0, 0, 0.15);
  border-top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  position: absolute;
}

.datepicker-dropdown:after {
  content: "";
  display: inline-block;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #fff;
  border-top: 0;
  position: absolute;
}

.datepicker-dropdown.datepicker-orient-left:before {
  left: 6px;
}

.datepicker-dropdown.datepicker-orient-left:after {
  left: 7px;
}

.datepicker-dropdown.datepicker-orient-right:before {
  right: 6px;
}

.datepicker-dropdown.datepicker-orient-right:after {
  right: 7px;
}

.datepicker-dropdown.datepicker-orient-bottom:before {
  top: -7px;
}

.datepicker-dropdown.datepicker-orient-bottom:after {
  top: -6px;
}

.datepicker-dropdown.datepicker-orient-top:before {
  bottom: -7px;
  border-bottom: 0;
  border-top: 7px solid rgba(0, 0, 0, 0.15);
}

.datepicker-dropdown.datepicker-orient-top:after {
  bottom: -6px;
  border-bottom: 0;
  border-top: 6px solid #fff;
}

.datepicker table {
  margin: 0;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.datepicker table tr td,
.datepicker table tr th {
  text-align: center;
  width: 30px;
  height: 30px;
  border-radius: 4px;
  border: none;
}

.table-striped .datepicker table tr td,
.table-striped .datepicker table tr th {
  background-color: transparent;
}

.datepicker table tr td.old,
.datepicker table tr td.new {
  color: #777777;
}

.datepicker table tr td.day:hover,
.datepicker table tr td.focused {
  background: #eeeeee;
  cursor: pointer;
}

.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
  background: none;
  color: #777777;
  cursor: default;
}

.datepicker table tr td.highlighted {
  color: #000;
  background-color: #d9edf7;
  border-color: #85c5e5;
  border-radius: 0;
}

.datepicker table tr td.highlighted:focus,
.datepicker table tr td.highlighted.focus {
  color: #000;
  background-color: #afd9ee;
  border-color: #298fc2;
}

.datepicker table tr td.highlighted:hover {
  color: #000;
  background-color: #afd9ee;
  border-color: #52addb;
}

.datepicker table tr td.highlighted:active,
.datepicker table tr td.highlighted.active {
  color: #000;
  background-color: #afd9ee;
  border-color: #52addb;
}

.datepicker table tr td.highlighted:active:hover,
.datepicker table tr td.highlighted.active:hover,
.datepicker table tr td.highlighted:active:focus,
.datepicker table tr td.highlighted.active:focus,
.datepicker table tr td.highlighted:active.focus,
.datepicker table tr td.highlighted.active.focus {
  color: #000;
  background-color: #91cbe8;
  border-color: #298fc2;
}

.datepicker table tr td.highlighted.disabled:hover,
.datepicker table tr td.highlighted[disabled]:hover,
fieldset[disabled] .datepicker table tr td.highlighted:hover,
.datepicker table tr td.highlighted.disabled:focus,
.datepicker table tr td.highlighted[disabled]:focus,
fieldset[disabled] .datepicker table tr td.highlighted:focus,
.datepicker table tr td.highlighted.disabled.focus,
.datepicker table tr td.highlighted[disabled].focus,
fieldset[disabled] .datepicker table tr td.highlighted.focus {
  background-color: #d9edf7;
  border-color: #85c5e5;
}

.datepicker table tr td.highlighted.focused {
  background: #afd9ee;
}

.datepicker table tr td.highlighted.disabled,
.datepicker table tr td.highlighted.disabled:active {
  background: #d9edf7;
  color: #777777;
}

.datepicker table tr td.today {
  color: #000;
  background-color: #ffdb99;
  border-color: #ffb733;
}

.datepicker table tr td.today:focus,
.datepicker table tr td.today.focus {
  color: #000;
  background-color: #ffc966;
  border-color: #b37400;
}

.datepicker table tr td.today:hover {
  color: #000;
  background-color: #ffc966;
  border-color: #f59e00;
}

.datepicker table tr td.today:active,
.datepicker table tr td.today.active {
  color: #000;
  background-color: #ffc966;
  border-color: #f59e00;
}

.datepicker table tr td.today:active:hover,
.datepicker table tr td.today.active:hover,
.datepicker table tr td.today:active:focus,
.datepicker table tr td.today.active:focus,
.datepicker table tr td.today:active.focus,
.datepicker table tr td.today.active.focus {
  color: #000;
  background-color: #ffbc42;
  border-color: #b37400;
}

.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.today[disabled]:hover,
fieldset[disabled] .datepicker table tr td.today:hover,
.datepicker table tr td.today.disabled:focus,
.datepicker table tr td.today[disabled]:focus,
fieldset[disabled] .datepicker table tr td.today:focus,
.datepicker table tr td.today.disabled.focus,
.datepicker table tr td.today[disabled].focus,
fieldset[disabled] .datepicker table tr td.today.focus {
  background-color: #ffdb99;
  border-color: #ffb733;
}

.datepicker table tr td.today.focused {
  background: #ffc966;
}

.datepicker table tr td.today.disabled,
.datepicker table tr td.today.disabled:active {
  background: #ffdb99;
  color: #777777;
}

.datepicker table tr td.range {
  color: #000;
  background-color: #eeeeee;
  border-color: #bbbbbb;
  border-radius: 0;
}

.datepicker table tr td.range:focus,
.datepicker table tr td.range.focus {
  color: #000;
  background-color: #d5d5d5;
  border-color: #7c7c7c;
}

.datepicker table tr td.range:hover {
  color: #000;
  background-color: #d5d5d5;
  border-color: #9d9d9d;
}

.datepicker table tr td.range:active,
.datepicker table tr td.range.active {
  color: #000;
  background-color: #d5d5d5;
  border-color: #9d9d9d;
}

.datepicker table tr td.range:active:hover,
.datepicker table tr td.range.active:hover,
.datepicker table tr td.range:active:focus,
.datepicker table tr td.range.active:focus,
.datepicker table tr td.range:active.focus,
.datepicker table tr td.range.active.focus {
  color: #000;
  background-color: #c3c3c3;
  border-color: #7c7c7c;
}

.datepicker table tr td.range.disabled:hover,
.datepicker table tr td.range[disabled]:hover,
fieldset[disabled] .datepicker table tr td.range:hover,
.datepicker table tr td.range.disabled:focus,
.datepicker table tr td.range[disabled]:focus,
fieldset[disabled] .datepicker table tr td.range:focus,
.datepicker table tr td.range.disabled.focus,
.datepicker table tr td.range[disabled].focus,
fieldset[disabled] .datepicker table tr td.range.focus {
  background-color: #eeeeee;
  border-color: #bbbbbb;
}

.datepicker table tr td.range.focused {
  background: #d5d5d5;
}

.datepicker table tr td.range.disabled,
.datepicker table tr td.range.disabled:active {
  background: #eeeeee;
  color: #777777;
}

.datepicker table tr td.range.highlighted {
  color: #000;
  background-color: #e4eef3;
  border-color: #9dc1d3;
}

.datepicker table tr td.range.highlighted:focus,
.datepicker table tr td.range.highlighted.focus {
  color: #000;
  background-color: #c1d7e3;
  border-color: #4b88a6;
}

.datepicker table tr td.range.highlighted:hover {
  color: #000;
  background-color: #c1d7e3;
  border-color: #73a6c0;
}

.datepicker table tr td.range.highlighted:active,
.datepicker table tr td.range.highlighted.active {
  color: #000;
  background-color: #c1d7e3;
  border-color: #73a6c0;
}

.datepicker table tr td.range.highlighted:active:hover,
.datepicker table tr td.range.highlighted.active:hover,
.datepicker table tr td.range.highlighted:active:focus,
.datepicker table tr td.range.highlighted.active:focus,
.datepicker table tr td.range.highlighted:active.focus,
.datepicker table tr td.range.highlighted.active.focus {
  color: #000;
  background-color: #a8c8d8;
  border-color: #4b88a6;
}

.datepicker table tr td.range.highlighted.disabled:hover,
.datepicker table tr td.range.highlighted[disabled]:hover,
fieldset[disabled] .datepicker table tr td.range.highlighted:hover,
.datepicker table tr td.range.highlighted.disabled:focus,
.datepicker table tr td.range.highlighted[disabled]:focus,
fieldset[disabled] .datepicker table tr td.range.highlighted:focus,
.datepicker table tr td.range.highlighted.disabled.focus,
.datepicker table tr td.range.highlighted[disabled].focus,
fieldset[disabled] .datepicker table tr td.range.highlighted.focus {
  background-color: #e4eef3;
  border-color: #9dc1d3;
}

.datepicker table tr td.range.highlighted.focused {
  background: #c1d7e3;
}

.datepicker table tr td.range.highlighted.disabled,
.datepicker table tr td.range.highlighted.disabled:active {
  background: #e4eef3;
  color: #777777;
}

.datepicker table tr td.range.today {
  color: #000;
  background-color: #f7ca77;
  border-color: #f1a417;
}

.datepicker table tr td.range.today:focus,
.datepicker table tr td.range.today.focus {
  color: #000;
  background-color: #f4b747;
  border-color: #815608;
}

.datepicker table tr td.range.today:hover {
  color: #000;
  background-color: #f4b747;
  border-color: #bf800c;
}

.datepicker table tr td.range.today:active,
.datepicker table tr td.range.today.active {
  color: #000;
  background-color: #f4b747;
  border-color: #bf800c;
}

.datepicker table tr td.range.today:active:hover,
.datepicker table tr td.range.today.active:hover,
.datepicker table tr td.range.today:active:focus,
.datepicker table tr td.range.today.active:focus,
.datepicker table tr td.range.today:active.focus,
.datepicker table tr td.range.today.active.focus {
  color: #000;
  background-color: #f2aa25;
  border-color: #815608;
}

.datepicker table tr td.range.today.disabled:hover,
.datepicker table tr td.range.today[disabled]:hover,
fieldset[disabled] .datepicker table tr td.range.today:hover,
.datepicker table tr td.range.today.disabled:focus,
.datepicker table tr td.range.today[disabled]:focus,
fieldset[disabled] .datepicker table tr td.range.today:focus,
.datepicker table tr td.range.today.disabled.focus,
.datepicker table tr td.range.today[disabled].focus,
fieldset[disabled] .datepicker table tr td.range.today.focus {
  background-color: #f7ca77;
  border-color: #f1a417;
}

.datepicker table tr td.range.today.disabled,
.datepicker table tr td.range.today.disabled:active {
  background: #f7ca77;
  color: #777777;
}

.datepicker table tr td.selected,
.datepicker table tr td.selected.highlighted {
  color: #fff;
  background-color: #777777;
  border-color: #555555;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

.datepicker table tr td.selected:focus,
.datepicker table tr td.selected.highlighted:focus,
.datepicker table tr td.selected.focus,
.datepicker table tr td.selected.highlighted.focus {
  color: #fff;
  background-color: #5e5e5e;
  border-color: #161616;
}

.datepicker table tr td.selected:hover,
.datepicker table tr td.selected.highlighted:hover {
  color: #fff;
  background-color: #5e5e5e;
  border-color: #373737;
}

.datepicker table tr td.selected:active,
.datepicker table tr td.selected.highlighted:active,
.datepicker table tr td.selected.active,
.datepicker table tr td.selected.highlighted.active {
  color: #fff;
  background-color: #5e5e5e;
  border-color: #373737;
}

.datepicker table tr td.selected:active:hover,
.datepicker table tr td.selected.highlighted:active:hover,
.datepicker table tr td.selected.active:hover,
.datepicker table tr td.selected.highlighted.active:hover,
.datepicker table tr td.selected:active:focus,
.datepicker table tr td.selected.highlighted:active:focus,
.datepicker table tr td.selected.active:focus,
.datepicker table tr td.selected.highlighted.active:focus,
.datepicker table tr td.selected:active.focus,
.datepicker table tr td.selected.highlighted:active.focus,
.datepicker table tr td.selected.active.focus,
.datepicker table tr td.selected.highlighted.active.focus {
  color: #fff;
  background-color: #4c4c4c;
  border-color: #161616;
}

.datepicker table tr td.selected.disabled:hover,
.datepicker table tr td.selected.highlighted.disabled:hover,
.datepicker table tr td.selected[disabled]:hover,
.datepicker table tr td.selected.highlighted[disabled]:hover,
fieldset[disabled] .datepicker table tr td.selected:hover,
fieldset[disabled] .datepicker table tr td.selected.highlighted:hover,
.datepicker table tr td.selected.disabled:focus,
.datepicker table tr td.selected.highlighted.disabled:focus,
.datepicker table tr td.selected[disabled]:focus,
.datepicker table tr td.selected.highlighted[disabled]:focus,
fieldset[disabled] .datepicker table tr td.selected:focus,
fieldset[disabled] .datepicker table tr td.selected.highlighted:focus,
.datepicker table tr td.selected.disabled.focus,
.datepicker table tr td.selected.highlighted.disabled.focus,
.datepicker table tr td.selected[disabled].focus,
.datepicker table tr td.selected.highlighted[disabled].focus,
fieldset[disabled] .datepicker table tr td.selected.focus,
fieldset[disabled] .datepicker table tr td.selected.highlighted.focus {
  background-color: #777777;
  border-color: #555555;
}

.datepicker table tr td.active,
.datepicker table tr td.active.highlighted {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

.datepicker table tr td.active:focus,
.datepicker table tr td.active.highlighted:focus,
.datepicker table tr td.active.focus,
.datepicker table tr td.active.highlighted.focus {
  color: #fff;
  background-color: #286090;
  border-color: #122b40;
}

.datepicker table tr td.active:hover,
.datepicker table tr td.active.highlighted:hover {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}

.datepicker table tr td.active:active,
.datepicker table tr td.active.highlighted:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active.highlighted.active {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}

.datepicker table tr td.active:active:hover,
.datepicker table tr td.active.highlighted:active:hover,
.datepicker table tr td.active.active:hover,
.datepicker table tr td.active.highlighted.active:hover,
.datepicker table tr td.active:active:focus,
.datepicker table tr td.active.highlighted:active:focus,
.datepicker table tr td.active.active:focus,
.datepicker table tr td.active.highlighted.active:focus,
.datepicker table tr td.active:active.focus,
.datepicker table tr td.active.highlighted:active.focus,
.datepicker table tr td.active.active.focus,
.datepicker table tr td.active.highlighted.active.focus {
  color: #fff;
  background-color: #204d74;
  border-color: #122b40;
}

.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active.highlighted.disabled:hover,
.datepicker table tr td.active[disabled]:hover,
.datepicker table tr td.active.highlighted[disabled]:hover,
fieldset[disabled] .datepicker table tr td.active:hover,
fieldset[disabled] .datepicker table tr td.active.highlighted:hover,
.datepicker table tr td.active.disabled:focus,
.datepicker table tr td.active.highlighted.disabled:focus,
.datepicker table tr td.active[disabled]:focus,
.datepicker table tr td.active.highlighted[disabled]:focus,
fieldset[disabled] .datepicker table tr td.active:focus,
fieldset[disabled] .datepicker table tr td.active.highlighted:focus,
.datepicker table tr td.active.disabled.focus,
.datepicker table tr td.active.highlighted.disabled.focus,
.datepicker table tr td.active[disabled].focus,
.datepicker table tr td.active.highlighted[disabled].focus,
fieldset[disabled] .datepicker table tr td.active.focus,
fieldset[disabled] .datepicker table tr td.active.highlighted.focus {
  background-color: #337ab7;
  border-color: #2e6da4;
}

.datepicker table tr td span {
  display: block;
  width: 23%;
  height: 54px;
  line-height: 54px;
  float: left;
  margin: 1%;
  cursor: pointer;
  border-radius: 4px;
}

.datepicker table tr td span:hover,
.datepicker table tr td span.focused {
  background: #eeeeee;
}

.datepicker table tr td span.disabled,
.datepicker table tr td span.disabled:hover {
  background: none;
  color: #777777;
  cursor: default;
}

.datepicker table tr td span.active,
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active.disabled:hover {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

.datepicker table tr td span.active:focus,
.datepicker table tr td span.active:hover:focus,
.datepicker table tr td span.active.disabled:focus,
.datepicker table tr td span.active.disabled:hover:focus,
.datepicker table tr td span.active.focus,
.datepicker table tr td span.active:hover.focus,
.datepicker table tr td span.active.disabled.focus,
.datepicker table tr td span.active.disabled:hover.focus {
  color: #fff;
  background-color: #286090;
  border-color: #122b40;
}

.datepicker table tr td span.active:hover,
.datepicker table tr td span.active:hover:hover,
.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active.disabled:hover:hover {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}

.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}

.datepicker table tr td span.active:active:hover,
.datepicker table tr td span.active:hover:active:hover,
.datepicker table tr td span.active.disabled:active:hover,
.datepicker table tr td span.active.disabled:hover:active:hover,
.datepicker table tr td span.active.active:hover,
.datepicker table tr td span.active:hover.active:hover,
.datepicker table tr td span.active.disabled.active:hover,
.datepicker table tr td span.active.disabled:hover.active:hover,
.datepicker table tr td span.active:active:focus,
.datepicker table tr td span.active:hover:active:focus,
.datepicker table tr td span.active.disabled:active:focus,
.datepicker table tr td span.active.disabled:hover:active:focus,
.datepicker table tr td span.active.active:focus,
.datepicker table tr td span.active:hover.active:focus,
.datepicker table tr td span.active.disabled.active:focus,
.datepicker table tr td span.active.disabled:hover.active:focus,
.datepicker table tr td span.active:active.focus,
.datepicker table tr td span.active:hover:active.focus,
.datepicker table tr td span.active.disabled:active.focus,
.datepicker table tr td span.active.disabled:hover:active.focus,
.datepicker table tr td span.active.active.focus,
.datepicker table tr td span.active:hover.active.focus,
.datepicker table tr td span.active.disabled.active.focus,
.datepicker table tr td span.active.disabled:hover.active.focus {
  color: #fff;
  background-color: #204d74;
  border-color: #122b40;
}

.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active:hover.disabled:hover,
.datepicker table tr td span.active.disabled.disabled:hover,
.datepicker table tr td span.active.disabled:hover.disabled:hover,
.datepicker table tr td span.active[disabled]:hover,
.datepicker table tr td span.active:hover[disabled]:hover,
.datepicker table tr td span.active.disabled[disabled]:hover,
.datepicker table tr td span.active.disabled:hover[disabled]:hover,
fieldset[disabled] .datepicker table tr td span.active:hover,
fieldset[disabled] .datepicker table tr td span.active:hover:hover,
fieldset[disabled] .datepicker table tr td span.active.disabled:hover,
fieldset[disabled] .datepicker table tr td span.active.disabled:hover:hover,
.datepicker table tr td span.active.disabled:focus,
.datepicker table tr td span.active:hover.disabled:focus,
.datepicker table tr td span.active.disabled.disabled:focus,
.datepicker table tr td span.active.disabled:hover.disabled:focus,
.datepicker table tr td span.active[disabled]:focus,
.datepicker table tr td span.active:hover[disabled]:focus,
.datepicker table tr td span.active.disabled[disabled]:focus,
.datepicker table tr td span.active.disabled:hover[disabled]:focus,
fieldset[disabled] .datepicker table tr td span.active:focus,
fieldset[disabled] .datepicker table tr td span.active:hover:focus,
fieldset[disabled] .datepicker table tr td span.active.disabled:focus,
fieldset[disabled] .datepicker table tr td span.active.disabled:hover:focus,
.datepicker table tr td span.active.disabled.focus,
.datepicker table tr td span.active:hover.disabled.focus,
.datepicker table tr td span.active.disabled.disabled.focus,
.datepicker table tr td span.active.disabled:hover.disabled.focus,
.datepicker table tr td span.active[disabled].focus,
.datepicker table tr td span.active:hover[disabled].focus,
.datepicker table tr td span.active.disabled[disabled].focus,
.datepicker table tr td span.active.disabled:hover[disabled].focus,
fieldset[disabled] .datepicker table tr td span.active.focus,
fieldset[disabled] .datepicker table tr td span.active:hover.focus,
fieldset[disabled] .datepicker table tr td span.active.disabled.focus,
fieldset[disabled] .datepicker table tr td span.active.disabled:hover.focus {
  background-color: #337ab7;
  border-color: #2e6da4;
}

.datepicker table tr td span.old,
.datepicker table tr td span.new {
  color: #777777;
}

.datepicker .datepicker-switch {
  width: 145px;
}

.datepicker .datepicker-switch,
.datepicker .prev,
.datepicker .next,
.datepicker tfoot tr th {
  cursor: pointer;
}

.datepicker .datepicker-switch:hover,
.datepicker .prev:hover,
.datepicker .next:hover,
.datepicker tfoot tr th:hover {
  background: #eeeeee;
}

.datepicker .prev.disabled,
.datepicker .next.disabled {
  visibility: hidden;
}

.datepicker .cw {
  font-size: 10px;
  width: 12px;
  padding: 0 2px 0 5px;
  vertical-align: middle;
}
.bootstrap-timepicker {
  position: relative;
}

.bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu {
  left: auto;
  right: 0;
}

.bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu:before {
  left: auto;
  right: 12px;
}

.bootstrap-timepicker.pull-right .bootstrap-timepicker-widget.dropdown-menu:after {
  left: auto;
  right: 13px;
}

.bootstrap-timepicker .input-group-addon {
  cursor: pointer;
}

.bootstrap-timepicker .input-group-addon i {
  display: inline-block;
  width: 16px;
  height: 16px;
}

.bootstrap-timepicker-widget.dropdown-menu {
  padding: 4px;
}

.bootstrap-timepicker-widget.dropdown-menu.open {
  display: inline-block;
}

.bootstrap-timepicker-widget.dropdown-menu:before {
  border-bottom: 7px solid rgba(0, 0, 0, 0.2);
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  content: "";
  display: inline-block;
  position: absolute;
}

.bootstrap-timepicker-widget.dropdown-menu:after {
  border-bottom: 6px solid #FFFFFF;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  content: "";
  display: inline-block;
  position: absolute;
}

.bootstrap-timepicker-widget.timepicker-orient-left:before {
  left: 6px;
}

.bootstrap-timepicker-widget.timepicker-orient-left:after {
  left: 7px;
}

.bootstrap-timepicker-widget.timepicker-orient-right:before {
  right: 6px;
}

.bootstrap-timepicker-widget.timepicker-orient-right:after {
  right: 7px;
}

.bootstrap-timepicker-widget.timepicker-orient-top:before {
  top: -7px;
}

.bootstrap-timepicker-widget.timepicker-orient-top:after {
  top: -6px;
}

.bootstrap-timepicker-widget.timepicker-orient-bottom:before {
  bottom: -7px;
  border-bottom: 0;
  border-top: 7px solid #999;
}

.bootstrap-timepicker-widget.timepicker-orient-bottom:after {
  bottom: -6px;
  border-bottom: 0;
  border-top: 6px solid #ffffff;
}

.bootstrap-timepicker-widget a.btn,
.bootstrap-timepicker-widget input {
  border-radius: 4px;
}

.bootstrap-timepicker-widget table {
  width: 100%;
  margin: 0;
}

.bootstrap-timepicker-widget table td {
  text-align: center;
  height: 30px;
  margin: 0;
  padding: 2px;
}

.bootstrap-timepicker-widget table td:not(.separator) {
  min-width: 30px;
}

.bootstrap-timepicker-widget table td span {
  width: 100%;
}

.bootstrap-timepicker-widget table td a {
  border: 1px transparent solid;
  width: 100%;
  display: inline-block;
  margin: 0;
  padding: 8px 0;
  outline: 0;
  color: #333;
}

.bootstrap-timepicker-widget table td a:hover {
  text-decoration: none;
  background-color: #eee;
  border-radius: 4px;
  border-color: #ddd;
}

.bootstrap-timepicker-widget table td a i {
  margin-top: 2px;
  font-size: 18px;
}

.bootstrap-timepicker-widget table td input {
  width: 25px;
  margin: 0;
  text-align: center;
}

.bootstrap-timepicker-widget .modal-content {
  padding: 4px;
}

@media (min-width: 767px) {
  .bootstrap-timepicker-widget.modal {
    width: 200px;
    margin-left: -100px;
  }
}
@media (max-width: 767px) {
  .bootstrap-timepicker {
    width: 100%;
  }

  .bootstrap-timepicker .dropdown-menu {
    width: 100%;
  }
}
.bootstrap-timepicker-widget .bootstrap-timepicker-hour,
.bootstrap-timepicker-widget .bootstrap-timepicker-minute,
.bootstrap-timepicker-widget .bootstrap-timepicker-meridian,
.bootstrap-timepicker-widget .bootstrap-timepicker-second {
  border: 0;
  background-color: transparent;
  outline: none !important;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: #7E8299;
  font-weight: 500;
}
.bootstrap-timepicker-widget table td {
  border-radius: 0.42rem;
  text-align: center;
}
.bootstrap-timepicker-widget table td > a {
  border: 0;
  border-radius: 0.42rem;
  width: 33px;
  height: 33px;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  margin: 0 auto;
}
.bootstrap-timepicker-widget table td > a span {
  font-size: 0.75rem;
  color: #B5B5C3;
  line-height: 1;
}
.bootstrap-timepicker-widget table td > a:hover {
  background: #F3F6F9;
}
@font-face {
  font-family: "Ki";
  src: url("../../demo1/plugins/global/fonts/Ki.eot");
  src: url("../../demo1/plugins/global/fonts/Ki.eot?#iefix") format("embedded-opentype"), url("../../demo1/plugins/global/fonts/Ki.woff") format("woff"), url("../../demo1/demo1/plugins/global/fonts/Ki.ttf") format("truetype"), url("../../demo1/plugins/global/fonts/Ki.svg#Ki") format("svg");
  font-weight: normal;
  font-style: normal;
}
.ki {
  font-size: 1rem;
}

.ki:before {
  font-family: "Ki";
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  line-height: 1;
  text-decoration: inherit;
  text-rendering: optimizeLegibility;
  text-transform: none;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
}

.ki-double-arrow-next:before {
  content: "";
}

.ki-double-arrow-back:before {
  content: "";
}

.ki-double-arrow-down:before {
  content: "";
}

.ki-double-arrow-up:before {
  content: "";
}

.ki-long-arrow-back:before {
  content: "";
}

.ki-arrow-next:before {
  content: "";
}

.ki-arrow-back:before {
  content: "";
}

.ki-long-arrow-next:before {
  content: "";
}

.ki-check:before {
  content: "";
}

.ki-arrow-down:before {
  content: "";
}

.ki-minus:before {
  content: "";
}

.ki-long-arrow-down:before {
  content: "";
}

.ki-long-arrow-up:before {
  content: "";
}

.ki-plus:before {
  content: "";
}

.ki-arrow-up:before {
  content: "";
}

.ki-round:before {
  content: "";
}

.ki-reload:before {
  content: "";
}

.ki-refresh:before {
  content: "";
}

.ki-solid-plus:before {
  content: "";
}

.ki-bold-close:before {
  content: "";
}

.ki-solid-minus:before {
  content: "";
}

.ki-hide:before {
  content: "";
}

.ki-code:before {
  content: "";
}

.ki-copy:before {
  content: "";
}

.ki-up-and-down:before {
  content: "";
}

.ki-left-and-right:before {
  content: "";
}

.ki-bold-triangle-bottom:before {
  content: "";
}

.ki-bold-triangle-right:before {
  content: "";
}

.ki-bold-triangle-top:before {
  content: "";
}

.ki-bold-triangle-left:before {
  content: "";
}

.ki-bold-double-arrow-up:before {
  content: "";
}

.ki-bold-double-arrow-next:before {
  content: "";
}

.ki-bold-double-arrow-back:before {
  content: "";
}

.ki-bold-double-arrow-down:before {
  content: "";
}

.ki-bold-arrow-down:before {
  content: "";
}

.ki-bold-arrow-next:before {
  content: "";
}

.ki-bold-arrow-back:before {
  content: "";
}

.ki-bold-arrow-up:before {
  content: "";
}

.ki-bold-check:before {
  content: "";
}

.ki-bold-wide-arrow-down:before {
  content: "";
}

.ki-bold-wide-arrow-up:before {
  content: "";
}

.ki-bold-wide-arrow-next:before {
  content: "";
}

.ki-bold-wide-arrow-back:before {
  content: "";
}

.ki-bold-long-arrow-up:before {
  content: "";
}

.ki-bold-long-arrow-down:before {
  content: "";
}

.ki-bold-long-arrow-back:before {
  content: "";
}

.ki-bold-long-arrow-next:before {
  content: "";
}

.ki-bold-check-1:before {
  content: "";
}

.ki-close:before {
  content: "";
}

.ki-more-ver:before {
  content: "";
}

.ki-bold-more-ver:before {
  content: "";
}

.ki-more-hor:before {
  content: "";
}

.ki-bold-more-hor:before {
  content: "";
}

.ki-bold-menu:before {
  content: "";
}

.ki-drag:before {
  content: "";
}

.ki-bold-sort:before {
  content: "";
}

.ki-eye:before {
  content: "";
}

.ki-outline-info:before {
  content: "";
}

.ki-menu:before {
  content: "";
}

.ki-menu-grid:before {
  content: "";
}

.ki-wrench:before {
  content: "";
}

.ki-gear:before {
  content: "";
}

.ki-info:before {
  content: "";
}

.ki-calendar-2:before {
  content: "";
}

.ki-calendar:before {
  content: "";
}

.ki-calendar-today:before {
  content: "";
}

.ki-clock:before {
  content: "";
}

.ki-dots:before {
  content: "";
}
.timeline.timeline-6 {
  position: relative;
}
.timeline.timeline-6:before {
  content: "";
  position: absolute;
  left: 51px;
  width: 3px;
  top: 0;
  bottom: 0;
  background-color: #EBEDF3;
}
.timeline.timeline-6 .timeline-item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;
  margin-bottom: 1.7rem;
}
.timeline.timeline-6 .timeline-item:last-child {
  margin-bottom: 0;
}
.timeline.timeline-6 .timeline-item .timeline-label {
  width: 50px;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  font-size: 1rem;
  font-weight: 500;
  position: relative;
  color: #3F4254;
}
.timeline.timeline-6 .timeline-item .timeline-badge {
  -ms-flex-negative: 0;
  flex-shrink: 0;
  background: white;
  width: 13px;
  height: 13px;
  border-radius: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  z-index: 1;
  position: relative;
  margin-top: 1px;
  margin-left: -0.5rem;
  padding: 3px !important;
  border: 6px solid #ffffff !important;
}
.timeline.timeline-6 .timeline-item .timeline-badge span {
  display: block;
  border-radius: 100%;
  width: 6px;
  height: 6px;
  background-color: #EBEDF3;
}
.timeline.timeline-6 .timeline-item .timeline-content {
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}

/*!
 * Bootstrap-select v1.13.18 (https://developer.snapappointments.com/bootstrap-select)
 *
 * Copyright 2012-2020 SnapAppointments, LLC
 * Licensed under MIT (https://github.com/snapappointments/bootstrap-select/blob/master/LICENSE)
 */
@-webkit-keyframes bs-notify-fadeOut {
  0% {
    opacity: 0.9;
  }
  100% {
    opacity: 0;
  }
}
@keyframes bs-notify-fadeOut {
  0% {
    opacity: 0.9;
  }
  100% {
    opacity: 0;
  }
}
select.bs-select-hidden,
.bootstrap-select > select.bs-select-hidden,
select.selectpicker {
  display: none !important;
}

.bootstrap-select {
  width: 220px \0 ;
  /*IE9 and below*/
  vertical-align: middle;
}

.bootstrap-select > .dropdown-toggle {
  position: relative;
  width: 100%;
  text-align: right;
  white-space: nowrap;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.bootstrap-select > .dropdown-toggle:after {
  margin-top: -1px;
}

.bootstrap-select > .dropdown-toggle.bs-placeholder,
.bootstrap-select > .dropdown-toggle.bs-placeholder:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder:active {
  color: #999;
}

.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-primary,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-secondary,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-success,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-danger,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-info,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-dark,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-primary:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-secondary:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-success:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-danger:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-info:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-dark:hover,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-primary:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-secondary:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-success:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-danger:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-info:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-dark:focus,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-primary:active,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-secondary:active,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-success:active,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-danger:active,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-info:active,
.bootstrap-select > .dropdown-toggle.bs-placeholder.btn-dark:active {
  color: rgba(255, 255, 255, 0.5);
}

.bootstrap-select > select {
  position: absolute !important;
  bottom: 0;
  left: 50%;
  display: block !important;
  width: 0.5px !important;
  height: 100% !important;
  padding: 0 !important;
  opacity: 0 !important;
  border: none;
  z-index: 0 !important;
}

.bootstrap-select > select.mobile-device {
  top: 0;
  left: 0;
  display: block !important;
  width: 100% !important;
  z-index: 2 !important;
}

.has-error .bootstrap-select .dropdown-toggle,
.error .bootstrap-select .dropdown-toggle,
.bootstrap-select.is-invalid .dropdown-toggle,
.was-validated .bootstrap-select select:invalid + .dropdown-toggle {
  border-color: #b94a48;
}

.bootstrap-select.is-valid .dropdown-toggle,
.was-validated .bootstrap-select select:valid + .dropdown-toggle {
  border-color: #28a745;
}

.bootstrap-select.fit-width {
  width: auto !important;
}

.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
  width: 220px;
}

.bootstrap-select > select.mobile-device:focus + .dropdown-toggle,
.bootstrap-select .dropdown-toggle:focus {
  outline: thin dotted #333333 !important;
  outline: 5px auto -webkit-focus-ring-color !important;
  outline-offset: -2px;
}

.bootstrap-select.form-control {
  margin-bottom: 0;
  padding: 0;
  border: none;
  height: auto;
}

:not(.input-group) > .bootstrap-select.form-control:not([class*=col-]) {
  width: 100%;
}

.bootstrap-select.form-control.input-group-btn {
  float: none;
  z-index: auto;
}

.form-inline .bootstrap-select,
.form-inline .bootstrap-select.form-control:not([class*=col-]) {
  width: auto;
}

.bootstrap-select:not(.input-group-btn),
.bootstrap-select[class*=col-] {
  float: none;
  display: inline-block;
  margin-left: 0;
}

.bootstrap-select.dropdown-menu-right,
.bootstrap-select[class*=col-].dropdown-menu-right,
.row .bootstrap-select[class*=col-].dropdown-menu-right {
  float: right;
}

.form-inline .bootstrap-select,
.form-horizontal .bootstrap-select,
.form-group .bootstrap-select {
  margin-bottom: 0;
}

.form-group-lg .bootstrap-select.form-control,
.form-group-sm .bootstrap-select.form-control {
  padding: 0;
}

.form-group-lg .bootstrap-select.form-control .dropdown-toggle,
.form-group-sm .bootstrap-select.form-control .dropdown-toggle {
  height: 100%;
  font-size: inherit;
  line-height: inherit;
  border-radius: inherit;
}

.bootstrap-select.form-control-sm .dropdown-toggle,
.bootstrap-select.form-control-lg .dropdown-toggle {
  font-size: inherit;
  line-height: inherit;
  border-radius: inherit;
}

.bootstrap-select.form-control-sm .dropdown-toggle {
  padding: 0.25rem 0.5rem;
}

.bootstrap-select.form-control-lg .dropdown-toggle {
  padding: 0.5rem 1rem;
}

.form-inline .bootstrap-select .form-control {
  width: 100%;
}

.bootstrap-select.disabled,
.bootstrap-select > .disabled {
  cursor: not-allowed;
}

.bootstrap-select.disabled:focus,
.bootstrap-select > .disabled:focus {
  outline: none !important;
}

.bootstrap-select.bs-container {
  position: absolute;
  top: 0;
  left: 0;
  height: 0 !important;
  padding: 0 !important;
}

.bootstrap-select.bs-container .dropdown-menu {
  z-index: 1060;
}

.bootstrap-select .dropdown-toggle .filter-option {
  position: static;
  top: 0;
  left: 0;
  float: left;
  height: 100%;
  width: 100%;
  text-align: left;
  overflow: hidden;
  -webkit-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
}

.bs3.bootstrap-select .dropdown-toggle .filter-option {
  padding-right: inherit;
}

.input-group .bs3-has-addon.bootstrap-select .dropdown-toggle .filter-option {
  position: absolute;
  padding-top: inherit;
  padding-bottom: inherit;
  padding-left: inherit;
  float: none;
}

.input-group .bs3-has-addon.bootstrap-select .dropdown-toggle .filter-option .filter-option-inner {
  padding-right: inherit;
}

.bootstrap-select .dropdown-toggle .filter-option-inner-inner {
  overflow: hidden;
}

.bootstrap-select .dropdown-toggle .filter-expand {
  width: 0 !important;
  float: left;
  opacity: 0 !important;
  overflow: hidden;
}

.bootstrap-select .dropdown-toggle .caret {
  position: absolute;
  top: 50%;
  right: 12px;
  margin-top: -2px;
  vertical-align: middle;
}

.input-group .bootstrap-select.form-control .dropdown-toggle {
  border-radius: inherit;
}

.bootstrap-select[class*=col-] .dropdown-toggle {
  width: 100%;
}

.bootstrap-select .dropdown-menu {
  min-width: 100%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.bootstrap-select .dropdown-menu > .inner:focus {
  outline: none !important;
}

.bootstrap-select .dropdown-menu.inner {
  position: static;
  float: none;
  border: 0;
  padding: 0;
  margin: 0;
  border-radius: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.bootstrap-select .dropdown-menu li {
  position: relative;
}

.bootstrap-select .dropdown-menu li.active small {
  color: rgba(255, 255, 255, 0.5) !important;
}

.bootstrap-select .dropdown-menu li.disabled a {
  cursor: not-allowed;
}

.bootstrap-select .dropdown-menu li a {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.bootstrap-select .dropdown-menu li a.opt {
  position: relative;
  padding-left: 2.25em;
}

.bootstrap-select .dropdown-menu li a span.check-mark {
  display: none;
}

.bootstrap-select .dropdown-menu li a span.text {
  display: inline-block;
}

.bootstrap-select .dropdown-menu li small {
  padding-left: 0.5em;
}

.bootstrap-select .dropdown-menu .notify {
  position: absolute;
  bottom: 5px;
  width: 96%;
  margin: 0 2%;
  min-height: 26px;
  padding: 3px 5px;
  background: #f5f5f5;
  border: 1px solid #e3e3e3;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
  pointer-events: none;
  opacity: 0.9;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.bootstrap-select .dropdown-menu .notify.fadeOut {
  -webkit-animation: 300ms linear 750ms forwards bs-notify-fadeOut;
  animation: 300ms linear 750ms forwards bs-notify-fadeOut;
}

.bootstrap-select .no-results {
  padding: 3px;
  background: #f5f5f5;
  margin: 0 5px;
  white-space: nowrap;
}

.bootstrap-select.fit-width .dropdown-toggle .filter-option {
  position: static;
  display: inline;
  padding: 0;
}

.bootstrap-select.fit-width .dropdown-toggle .filter-option-inner,
.bootstrap-select.fit-width .dropdown-toggle .filter-option-inner-inner {
  display: inline;
}

.bootstrap-select.fit-width .dropdown-toggle .bs-caret:before {
  content: " ";
}

.bootstrap-select.fit-width .dropdown-toggle .caret {
  position: static;
  top: auto;
  margin-top: -1px;
}

.bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
  position: absolute;
  display: inline-block;
  right: 15px;
  top: 5px;
}

.bootstrap-select.show-tick .dropdown-menu li a span.text {
  margin-right: 34px;
}

.bootstrap-select .bs-ok-default:after {
  content: "";
  display: block;
  width: 0.5em;
  height: 1em;
  border-style: solid;
  border-width: 0 0.26em 0.26em 0;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.bootstrap-select.show-menu-arrow.open > .dropdown-toggle,
.bootstrap-select.show-menu-arrow.show > .dropdown-toggle {
  z-index: 1061;
}

.bootstrap-select.show-menu-arrow .dropdown-toggle .filter-option:before {
  content: "";
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  border-bottom: 7px solid rgba(204, 204, 204, 0.2);
  position: absolute;
  bottom: -4px;
  left: 9px;
  display: none;
}

.bootstrap-select.show-menu-arrow .dropdown-toggle .filter-option:after {
  content: "";
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid white;
  position: absolute;
  bottom: -4px;
  left: 10px;
  display: none;
}

.bootstrap-select.show-menu-arrow.dropup .dropdown-toggle .filter-option:before {
  bottom: auto;
  top: -4px;
  border-top: 7px solid rgba(204, 204, 204, 0.2);
  border-bottom: 0;
}

.bootstrap-select.show-menu-arrow.dropup .dropdown-toggle .filter-option:after {
  bottom: auto;
  top: -4px;
  border-top: 6px solid white;
  border-bottom: 0;
}

.bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle .filter-option:before {
  right: 12px;
  left: auto;
}

.bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle .filter-option:after {
  right: 13px;
  left: auto;
}

.bootstrap-select.show-menu-arrow.open > .dropdown-toggle .filter-option:before,
.bootstrap-select.show-menu-arrow.show > .dropdown-toggle .filter-option:before,
.bootstrap-select.show-menu-arrow.open > .dropdown-toggle .filter-option:after,
.bootstrap-select.show-menu-arrow.show > .dropdown-toggle .filter-option:after {
  display: block;
}

.bs-searchbox,
.bs-actionsbox,
.bs-donebutton {
  padding: 4px 8px;
}

.bs-actionsbox {
  width: 100%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.bs-actionsbox .btn-group button {
  width: 50%;
}

.bs-donebutton {
  float: left;
  width: 100%;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.bs-donebutton .btn-group button {
  width: 100%;
}

.bs-searchbox + .bs-actionsbox {
  padding: 0 8px 4px;
}

.bs-searchbox .form-control {
  margin-bottom: 0;
  width: 100%;
  float: none;
}
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('layout.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('layout.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                @yield('content')
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Drawers-->


    <!--end::Drawers-->
    <!--begin::Engage drawers-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--end::Vendors Javascript-->

    <script src="{{ asset('demo1/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/form-repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-timepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('demo1/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @if(Session::has('success'))

        <script>
            swal({

                title: "Success!",

                text: "{{ Session::get('success') }}",

                icon: 'success'

            });
        </script>

    @endif

    @if(Session::has('error'))

        <script>
            swal({

                title: "Error!",

                text: "{{ Session::get('error') }}",

                icon: 'error'

            });
        </script>

    @endif
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //punch in punch out 
        function punchInpunchOut() {
            $.ajax({
                url: "{{ route('attendance.store') }}",
                method: "POST",
                data: {
                    _token: CSRF_TOKEN
                },
				beforeSend: function() { 
				$(".punchInpunchOut").prop('disabled', true);;
				},
                success: function (response) {
                    if (response == 'add') {
                        swal({

                            title: "Success!",
                            text: "Punch In",
                             icon: 'success'

                        });
                    } else {
                        swal({

                            title: "Success!",
							text: "Punch Out",
                            icon: 'success'

                        });
                    }
					$(".punchInpunchOut").text("Punch Out");
					$(".punchInpunchOut").prop('disabled', false);
					location.reload();

                },
                error: function () {
                    alert("error");
                }

            });

        } 
		
		//Break start 
        function startBreak(id) {
            $.ajax({
                url: "{{ route('breakStart') }}",
                method: "POST",
                data: {
                    _token: CSRF_TOKEN,
					id:id
                },
				beforeSend: function() { 
				$(".startBreak").prop('disabled', true);;
				},
                success: function (response) {
                    if (response == 'add') {
                        swal({

                            title: "Success!",
                            text: "Break added",
                             icon: 'success'

                        });
                    } 
					location.reload();

                },
                error: function () {
                    alert("error");
                }

            });

        } 
		function endBreak(id) {
            $.ajax({
                url: "{{ route('breakEnd') }}",
                method: "POST",
                data: {
                    _token: CSRF_TOKEN,
					id:id
                },
				beforeSend: function() { 
				$(".endBreak").prop('disabled', true);;
				},
                success: function (response) {
                    if (response == 'add') {
                        swal({

                            title: "Success!",
                            text: "Break added",
                             icon: 'success'

                        });
                    } 
					location.reload();
                },
                error: function () {
                    alert("error");
                }

            });

        }
    
      $('.change-status').change(function(){
        var status= $(this).val();
        if(status) {
        var id = $('option:selected',this).data("id")
        $.ajax({
            url: "{{ route('changeStatus') }}",
                method: "POST",
                data: {
                    _token: CSRF_TOKEN,
					id:id,
                    status:status
                },
          success:function(data)
          {
            if (data) {
                        swal({

                            title: "Success!",
                            text: "Status updated",
                             icon: 'success'

                        });
                    }
          }
        });
    }
      });

      function validateForm(id) {
      event.preventDefault(); // prevent form submit
      var form = $('#delete-'+id); // storing the form
      swal({
             title: "Are you sure?",
             text: "Once deleted, you will not be able to recover this imaginary file!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
          .then((willDelete) => {
               if (willDelete) {
                     form.submit();
               } else {
                      swal("Your imaginary file is safe!");
           }
        });
}
$(function () {
    $('.selectpicker').selectpicker();

    jQuery(document).on('blur', ".edit-course", function () {
      var course_id = $(this).attr('data-id');
      var type = $(this).attr('data-type');
      var value = $(this).val();
      var current = $(this);
      if(type) {
        $.ajax({
            url: "{{ route('update-course') }}",
                method: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    course_id:course_id,
                    type:type,
                    value:value
                },
          success:function(data)
          {
             if(data)
             {
                $(current).after('<span class="badge badge-light-success">Update Successfully</span>');
             }
             else
             {
              $(current).after('<span class="badge badge-light-danger">Something goes wrong</span>')
             }
             setTimeout(function(){
            $(".badge").hide();
        }, 1000);
          }
        });
    }


     });
    
});

    </script>

</body>
<!--end::Body-->

</html>