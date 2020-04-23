<?php

namespace App\Regex;

class ProductTemplate
{
    const PRODUCT = '/(Nokian|BFGoodrich|Pirelli|Toyo|Continental|Hankook|Mitas)\s+(.*?)\s+(\d+)\/(\d+)\s?(R)(\d+)\s+(\d+)([A-Z])/m';
    const ATTRIBUTE = '/(XL)/';
    const RUNFLAT = '/(RunFlat|Run Flat|ROF|ZP|SSR|ZPS|HRS|RFT)/';
    const CAMERA = '/(TT|TL|TL\/TT)/';
    const SEASON = '/(Зимние \(шипованные\)|Внедорожные|Летние|Зимние \(нешипованные\)|Всесезонные)/';
}