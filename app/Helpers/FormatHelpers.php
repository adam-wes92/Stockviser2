<?php

function formatMarketCap($value) {
    if ($value >= 1000000000000) {
        return round($value / 1000000000000, 2) . ' T';
    } elseif ($value >= 1000000000) {
        return round($value / 1000000000, 2) . ' B';
    } elseif ($value >= 1000000) {
        return round($value / 1000000, 2) . ' M';
    } else {
        return $value;
    }
}
