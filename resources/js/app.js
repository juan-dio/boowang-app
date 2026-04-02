import './bootstrap';

import * as bootstrap from 'bootstrap';

import QRCode from 'qrcode';
window.QRCode = QRCode;

import feather from "feather-icons";
feather.replace();

import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import Chart from 'chart.js/auto';
window.Chart = Chart;

import Trix from "trix";

// import.meta.glob([
//   './public/**',
// ]);