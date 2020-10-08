<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $countries = [
            ['id' => 1, 'code' => 'IR', 'title' => 'Iran', 'title_fa' => 'ایران'],
            ['id' => 2, 'code' => 'JP', 'title' => 'Japan', 'title_fa' => 'ژاپن'],
            ['id' => 3, 'code' => 'US', 'title' => 'United States', 'title_fa' => 'ایالات متحده آمریکا'],
            ['id' => 4, 'code' => 'MX', 'title' => 'Mexico', 'title_fa' => 'مکزیک'],
            ['id' => 5, 'code' => 'IN', 'title' => 'India', 'title_fa' => 'هند'],
            ['id' => 6, 'code' => 'BR', 'title' => 'Brazil', 'title_fa' => 'برزیل'],
            ['id' => 7, 'code' => 'CN', 'title' => 'China', 'title_fa' => 'چین'],
            ['id' => 8, 'code' => 'BD', 'title' => 'Bangladesh', 'title_fa' => 'بنگلادش'],
            ['id' => 9, 'code' => 'AR', 'title' => 'Argentina', 'title_fa' => 'آرژانتین'],
            ['id' => 10, 'code' => 'PK', 'title' => 'Pakistan', 'title_fa' => 'پاکستان'],
            ['id' => 11, 'code' => 'EG', 'title' => 'Egypt', 'title_fa' => 'مصر'],
            ['id' => 12, 'code' => 'PH', 'title' => 'Philippines', 'title_fa' => 'فیلیپین'],
            ['id' => 13, 'code' => 'RU', 'title' => 'Russia', 'title_fa' => 'روسیه'],
            ['id' => 14, 'code' => 'TR', 'title' => 'Turkey', 'title_fa' => 'ترکیه'],
            ['id' => 15, 'code' => 'FR', 'title' => 'France', 'title_fa' => 'فرانسه'],
            ['id' => 16, 'code' => 'KR', 'title' => 'Korea, South', 'title_fa' => 'کره جنوبی'],
            ['id' => 17, 'code' => 'NG', 'title' => 'Nigeria', 'title_fa' => 'نیجریه'],
            ['id' => 18, 'code' => 'ID', 'title' => 'Indonesia', 'title_fa' => 'اندونزی'],
            ['id' => 19, 'code' => 'GB', 'title' => 'United Kingdom', 'title_fa' => 'بریتانیا'],
            ['id' => 20, 'code' => 'PE', 'title' => 'Peru', 'title_fa' => 'پرو'],
            ['id' => 21, 'code' => 'CD', 'title' => 'Congo (Kinshasa)', 'title_fa' => 'کنگو'],
            ['id' => 22, 'code' => 'CO', 'title' => 'Colombia', 'title_fa' => 'کلمبیا'],
            ['id' => 23, 'code' => 'HK', 'title' => 'Hong Kong', 'title_fa' => 'هنگ کنگ'],
            ['id' => 24, 'code' => 'TW', 'title' => 'Taiwan', 'title_fa' => 'تایوان'],
            ['id' => 25, 'code' => 'TH', 'title' => 'Thailand', 'title_fa' => 'تایلند'],
            ['id' => 26, 'code' => 'CL', 'title' => 'Chile', 'title_fa' => 'شیلی'],
            ['id' => 27, 'code' => 'ES', 'title' => 'Spain', 'title_fa' => 'اسپانیا'],
            ['id' => 28, 'code' => 'VN', 'title' => 'Vietnam', 'title_fa' => 'ویتنام'],
            ['id' => 29, 'code' => 'CA', 'title' => 'Canada', 'title_fa' => 'کانادا'],
            ['id' => 30, 'code' => 'SG', 'title' => 'Singapore', 'title_fa' => 'سنگاپور'],
            ['id' => 31, 'code' => 'AO', 'title' => 'Angola', 'title_fa' => 'آنگولا'],
            ['id' => 32, 'code' => 'IQ', 'title' => 'Iraq', 'title_fa' => 'عراق'],
            ['id' => 33, 'code' => 'SD', 'title' => 'Sudan', 'title_fa' => 'سودان'],
            ['id' => 34, 'code' => 'AU', 'title' => 'Australia', 'title_fa' => 'استرالیا'],
            ['id' => 35, 'code' => 'SA', 'title' => 'Saudi Arabia', 'title_fa' => 'عربستان سعودی'],
            ['id' => 36, 'code' => 'MM', 'title' => 'Burma', 'title_fa' => 'برمه'],
            ['id' => 37, 'code' => 'CI', 'title' => 'Ivory Coast', 'title_fa' => 'ساحل عاج'],
            ['id' => 38, 'code' => 'ZA', 'title' => 'South Africa', 'title_fa' => 'آفریقای جنوبی'],
            ['id' => 39, 'code' => 'DE', 'title' => 'Germany', 'title_fa' => 'آلمان'],
            ['id' => 40, 'code' => 'DZ', 'title' => 'Algeria', 'title_fa' => 'الجزایر'],
            ['id' => 41, 'code' => 'IT', 'title' => 'Italy', 'title_fa' => 'ایتالیا'],
            ['id' => 42, 'code' => 'KP', 'title' => 'Korea, North', 'title_fa' => 'کره شمالی'],
            ['id' => 43, 'code' => 'AF', 'title' => 'Afghanistan', 'title_fa' => 'افغانستان'],
            ['id' => 44, 'code' => 'GR', 'title' => 'Greece', 'title_fa' => 'یونان'],
            ['id' => 45, 'code' => 'MA', 'title' => 'Morocco', 'title_fa' => 'مراکش'],
            ['id' => 47, 'code' => 'ET', 'title' => 'Ethiopia', 'title_fa' => 'اتیوپی'],
            ['id' => 48, 'code' => 'KE', 'title' => 'Kenya', 'title_fa' => 'کنیا'],
            ['id' => 49, 'code' => 'VE', 'title' => 'Venezuela', 'title_fa' => 'ونزوئلا'],
            ['id' => 50, 'code' => 'TZ', 'title' => 'Tanzania', 'title_fa' => 'تانزانیا'],
            ['id' => 51, 'code' => 'PT', 'title' => 'Portugal', 'title_fa' => 'پرتغال'],
            ['id' => 52, 'code' => 'PL', 'title' => 'Poland', 'title_fa' => 'لهستان'],
            ['id' => 53, 'code' => 'SY', 'title' => 'Syria', 'title_fa' => 'سوریه'],
            ['id' => 54, 'code' => 'UA', 'title' => 'Ukraine', 'title_fa' => 'اوکراین'],
            ['id' => 55, 'code' => 'SN', 'title' => 'Senegal', 'title_fa' => 'سنگال'],
            ['id' => 56, 'code' => 'EC', 'title' => 'Ecuador', 'title_fa' => 'اکوادور'],
            ['id' => 57, 'code' => 'MY', 'title' => 'Malaysia', 'title_fa' => 'مالزی'],
            ['id' => 58, 'code' => 'TN', 'title' => 'Tunisia', 'title_fa' => 'تونس'],
            ['id' => 59, 'code' => 'AT', 'title' => 'Austria', 'title_fa' => 'اتریش'],
            ['id' => 60, 'code' => 'LY', 'title' => 'Libya', 'title_fa' => 'لیبی'],
            ['id' => 61, 'code' => 'UZ', 'title' => 'Uzbekistan', 'title_fa' => 'ازبکستان'],
            ['id' => 62, 'code' => 'CU', 'title' => 'Cuba', 'title_fa' => 'کوبا'],
            ['id' => 63, 'code' => 'DO', 'title' => 'Dominican Republic', 'title_fa' => 'جمهوری دومینیکن'],
            ['id' => 64, 'code' => 'AZ', 'title' => 'Azerbaijan', 'title_fa' => 'آذربایجان'],
            ['id' => 65, 'code' => 'GH', 'title' => 'Ghana', 'title_fa' => 'غنا'],
            ['id' => 66, 'code' => 'BO', 'title' => 'Bolivia', 'title_fa' => 'بولیوی'],
            ['id' => 67, 'code' => 'KW', 'title' => 'Kuwait', 'title_fa' => 'کویت'],
            ['id' => 68, 'code' => 'YE', 'title' => 'Yemen', 'title_fa' => 'یمن'],
            ['id' => 69, 'code' => 'HT', 'title' => 'Haiti', 'title_fa' => 'هائیتی'],
            ['id' => 70, 'code' => 'RO', 'title' => 'Romania', 'title_fa' => 'رومانی'],
            ['id' => 71, 'code' => 'CM', 'title' => 'Cameroon', 'title_fa' => 'کامرون'],
            ['id' => 72, 'code' => 'PY', 'title' => 'Paraguay', 'title_fa' => 'پاراگوئه'],
            ['id' => 73, 'code' => 'LB', 'title' => 'Lebanon', 'title_fa' => 'لبنان'],
            ['id' => 74, 'code' => 'BY', 'title' => 'Belarus', 'title_fa' => 'بلاروس'],
            ['id' => 75, 'code' => 'BE', 'title' => 'Belgium', 'title_fa' => 'بلژیک'],
            ['id' => 76, 'code' => 'MG', 'title' => 'Madagascar', 'title_fa' => 'ماداگاسکار'],
            ['id' => 77, 'code' => 'HU', 'title' => 'Hungary', 'title_fa' => 'مجارستان'],
            ['id' => 78, 'code' => 'ZW', 'title' => 'Zimbabwe', 'title_fa' => 'زیمبابوه'],
            ['id' => 79, 'code' => 'UY', 'title' => 'Uruguay', 'title_fa' => 'اروگوئه'],
            ['id' => 80, 'code' => 'ML', 'title' => 'Mali', 'title_fa' => 'مالی'],
            ['id' => 81, 'code' => 'GN', 'title' => 'Guinea', 'title_fa' => 'گینه'],
            ['id' => 82, 'code' => 'KH', 'title' => 'Cambodia', 'title_fa' => 'کامبوج'],
            ['id' => 83, 'code' => 'TG', 'title' => 'Togo', 'title_fa' => 'توگو'],
            ['id' => 84, 'code' => 'QA', 'title' => 'Qatar', 'title_fa' => 'قطر'],
            ['id' => 85, 'code' => 'MZ', 'title' => 'Mozambique', 'title_fa' => 'موزامبیک'],
            ['id' => 86, 'code' => 'SV', 'title' => 'El Salvador', 'title_fa' => 'السالوادور'],
            ['id' => 87, 'code' => 'UG', 'title' => 'Uganda', 'title_fa' => 'اوگاندا'],
            ['id' => 88, 'code' => 'NL', 'title' => 'Netherlands', 'title_fa' => 'هلند'],
            ['id' => 89, 'code' => 'AE', 'title' => 'United Arab Emirates', 'title_fa' => 'امارات متحده عربی'],
            ['id' => 90, 'code' => 'NZ', 'title' => 'New Zealand', 'title_fa' => 'نیوزلند'],
            ['id' => 91, 'code' => 'CG', 'title' => 'Congo (Brazzaville)', 'title_fa' => 'جمهوری کنگو'],
            ['id' => 92, 'code' => 'ZM', 'title' => 'Zambia', 'title_fa' => 'زامبیا'],
            ['id' => 93, 'code' => 'CR', 'title' => 'Costa Rica', 'title_fa' => 'کاستاریکا'],
            ['id' => 94, 'code' => 'PA', 'title' => 'Panama', 'title_fa' => 'پاناما'],
            ['id' => 95, 'code' => 'SE', 'title' => 'Sweden', 'title_fa' => 'سوئد'],
            ['id' => 96, 'code' => 'CH', 'title' => 'Switzerland', 'title_fa' => 'سوئیس'],
            ['id' => 97, 'code' => 'KZ', 'title' => 'Kazakhstan', 'title_fa' => 'قزاقستان'],
            ['id' => 98, 'code' => 'BG', 'title' => 'Bulgaria', 'title_fa' => 'بلغارستان'],
            ['id' => 99, 'code' => 'CZ', 'title' => 'Czechia', 'title_fa' => 'جمهوری چک'],
            ['id' => 100, 'code' => 'BF', 'title' => 'Burkina Faso', 'title_fa' => 'بورکینافاسو'],
            ['id' => 101, 'code' => 'FI', 'title' => 'Finland', 'title_fa' => 'فنلاند'],
            ['id' => 102, 'code' => 'AM', 'title' => 'Armenia', 'title_fa' => 'ارمنستان'],
            ['id' => 103, 'code' => 'SO', 'title' => 'Somalia', 'title_fa' => 'سومالی'],
            ['id' => 104, 'code' => 'GE', 'title' => 'Georgia', 'title_fa' => 'گرجستان'],
            ['id' => 105, 'code' => 'RS', 'title' => 'Serbia', 'title_fa' => 'صربستان'],
            ['id' => 106, 'code' => 'TJ', 'title' => 'Tajikistan', 'title_fa' => 'تاجیکستان'],
            ['id' => 107, 'code' => 'DK', 'title' => 'Denmark', 'title_fa' => 'دانمارک'],
            ['id' => 108, 'code' => 'JO', 'title' => 'Jordan', 'title_fa' => 'اردن'],
            ['id' => 109, 'code' => 'IE', 'title' => 'Ireland', 'title_fa' => 'ایرلند'],
            ['id' => 110, 'code' => 'LR', 'title' => 'Liberia', 'title_fa' => 'لیبریا'],
            ['id' => 111, 'code' => 'GT', 'title' => 'Guatemala', 'title_fa' => 'گواتمالا'],
            ['id' => 112, 'code' => 'TD', 'title' => 'Chad', 'title_fa' => 'چاد'],
            ['id' => 113, 'code' => 'HN', 'title' => 'Honduras', 'title_fa' => 'هندوراس'],
            ['id' => 114, 'code' => 'JM', 'title' => 'Jamaica', 'title_fa' => 'جامائیکا'],
            ['id' => 115, 'code' => 'DJ', 'title' => 'Djibouti', 'title_fa' => 'جیبوتی'],
            ['id' => 116, 'code' => 'NI', 'title' => 'Nicaragua', 'title_fa' => 'نیکاراگوئه'],
            ['id' => 117, 'code' => 'NE', 'title' => 'Niger', 'title_fa' => 'نیجر'],
            ['id' => 118, 'code' => 'AL', 'title' => 'Albania', 'title_fa' => 'آلبانی'],
            ['id' => 119, 'code' => 'NP', 'title' => 'Nepal', 'title_fa' => 'نپال'],
            ['id' => 120, 'code' => 'MN', 'title' => 'Mongolia', 'title_fa' => 'مغولستان'],
            ['id' => 121, 'code' => 'RW', 'title' => 'Rwanda', 'title_fa' => 'رواندا'],
            ['id' => 122, 'code' => 'KG', 'title' => 'Kyrgyzstan', 'title_fa' => 'قرقیزستان'],
            ['id' => 123, 'code' => 'NO', 'title' => 'Norway', 'title_fa' => 'نروژ'],
            ['id' => 124, 'code' => 'CF', 'title' => 'Central African Republic', 'title_fa'=>NULL],
            ['id' => 125, 'code' => 'SL', 'title' => 'Sierra Leone', 'title_fa' => 'سیرالئون'],
            ['id' => 126, 'code' => 'BJ', 'title' => 'Benin', 'title_fa'=>NULL],
            ['id' => 127, 'code' => 'LA', 'title' => 'Laos', 'title_fa' => 'لائوس'],
            ['id' => 128, 'code' => 'LV', 'title' => 'Latvia', 'title_fa' => 'لتونی'],
            ['id' => 129, 'code' => 'MR', 'title' => 'Mauritania', 'title_fa'=>NULL],
            ['id' => 130, 'code' => 'OM', 'title' => 'Oman', 'title_fa' => 'عمان'],
            ['id' => 131, 'code' => 'TM', 'title' => 'Turkmenistan', 'title_fa' => 'ترکمنستان'],
            ['id' => 132, 'code' => 'HR', 'title' => 'Croatia', 'title_fa' => 'کرواسی'],
            ['id' => 133, 'code' => 'BA', 'title' => 'Bosnia And Herzegovina', 'title_fa'=>NULL],
            ['id' => 134, 'code' => 'MD', 'title' => 'Moldova', 'title_fa'=>NULL],
            ['id' => 135, 'code' => 'MW', 'title' => 'Malawi', 'title_fa'=>NULL],
            ['id' => 136, 'code' => 'ER', 'title' => 'Eritrea', 'title_fa' => 'اریتره'],
            ['id' => 137, 'code' => 'MU', 'title' => 'Mauritius', 'title_fa'=>NULL],
            ['id' => 138, 'code' => 'GA', 'title' => 'Gabon', 'title_fa' => 'گابن'],
            ['id' => 139, 'code' => 'BH', 'title' => 'Bahrain', 'title_fa' => 'بحرین'],
            ['id' => 140, 'code' => 'LT', 'title' => 'Lithuania', 'title_fa' => 'لیتوانی'],
            ['id' => 141, 'code' => 'MK', 'title' => 'Macedonia', 'title_fa' => 'مقدونیه شمالی'],
            ['id' => 142, 'code' => 'SK', 'title' => 'Slovakia', 'title_fa' => 'اسلواکی'],
            ['id' => 143, 'code' => 'GW', 'title' => 'Guinea-Bissau', 'title_fa' => 'گینه بیسائو'],
            ['id' => 144, 'code' => 'EE', 'title' => 'Estonia', 'title_fa' => 'استونی'],
            ['id' => 145, 'code' => 'MT', 'title' => 'Malta', 'title_fa' => 'مالت'],
            ['id' => 146, 'code' => 'LS', 'title' => 'Lesotho', 'title_fa' => 'لسوتو'],
            ['id' => 147, 'code' => 'BI', 'title' => 'Burundi', 'title_fa' => 'بوروندی'],
            ['id' => 148, 'code' => 'SI', 'title' => 'Slovenia', 'title_fa' => 'اسلوونی'],
            ['id' => 149, 'code' => 'BN', 'title' => 'Brunei', 'title_fa' => 'برونئی'],
            ['id' => 150, 'code' => 'TT', 'title' => 'Trinidad And Tobago', 'title_fa' => 'ترینیداد و توباگو'],
            ['id' => 151, 'code' => 'PG', 'title' => 'Papua New Guinea', 'title_fa' => 'پاپوآ گینه نو'],
            ['id' => 152, 'code' => 'NA', 'title' => 'Namibia', 'title_fa' => 'نامیبیا'],
            ['id' => 153, 'code' => 'GY', 'title' => 'Guyana', 'title_fa' => 'گویان'],
            ['id' => 154, 'code' => 'SR', 'title' => 'Suriname', 'title_fa' => 'سورینام'],
            ['id' => 155, 'code' => 'TL', 'title' => 'Timor-Leste', 'title_fa' => 'تیمور شرقی'],
            ['id' => 156, 'code' => 'BS', 'title' => 'Bahamas, The', 'title_fa' => 'باهاماس'],
            ['id' => 157, 'code' => 'CY', 'title' => 'Cyprus', 'title_fa' => 'قبرس'],
            ['id' => 158, 'code' => 'LK', 'title' => 'Sri Lanka', 'title_fa' => 'سریلانکا'],
            ['id' => 159, 'code' => 'BW', 'title' => 'Botswana', 'title_fa' => 'بوتسوانا'],
            ['id' => 160, 'code' => 'BB', 'title' => 'Barbados', 'title_fa' => 'باربادوس'],
            ['id' => 161, 'code' => 'FJ', 'title' => 'Fiji', 'title_fa' => 'فیجی'],
            ['id' => 162, 'code' => 'IS', 'title' => 'Iceland', 'title_fa' => 'ایسلند'],
            ['id' => 163, 'code' => 'GQ', 'title' => 'Equatorial Guinea', 'title_fa' => 'گینه استوایی'],
            ['id' => 164, 'code' => 'CW', 'title' => 'Curaçao', 'title_fa' => 'کوراسائو'],
            ['id' => 165, 'code' => 'ME', 'title' => 'Montenegro', 'title_fa' => 'مونته‌نگرو'],
            ['id' => 166, 'code' => 'KM', 'title' => 'Comoros', 'title_fa' => 'اتحاد قمر'],
            ['id' => 167, 'code' => 'CV', 'title' => 'Cabo Verde', 'title_fa' => 'دماغه سبز'],
            ['id' => 168, 'code' => 'MV', 'title' => 'Maldives', 'title_fa' => 'مالدیو'],
            ['id' => 169, 'code' => 'SS', 'title' => 'South Sudan', 'title_fa' => 'سودان جنوبی'],
            ['id' => 170, 'code' => 'LU', 'title' => 'Luxembourg', 'title_fa' => 'لوکزامبورگ'],
            ['id' => 171, 'code' => 'BT', 'title' => 'Bhutan', 'title_fa' => 'بوتان'],
            ['id' => 172, 'code' => 'SZ', 'title' => 'Swaziland', 'title_fa' => 'سوازیلند'],
            ['id' => 173, 'code' => 'ST', 'title' => 'Sao Tome And Principe', 'title_fa' => 'سائوتومه و پرنسیپ'],
            ['id' => 174, 'code' => 'SB', 'title' => 'Solomon Islands', 'title_fa' => 'جزایر سلیمان'],
            ['id' => 175, 'code' => 'AW', 'title' => 'Aruba', 'title_fa' => 'آروبا'],
            ['id' => 176, 'code' => 'WS', 'title' => 'Samoa', 'title_fa' => 'ساموآ'],
            ['id' => 177, 'code' => 'AD', 'title' => 'Andorra', 'title_fa' => 'آندورا'],
            ['id' => 178, 'code' => 'VC', 'title' => 'Saint Vincent And The Grenadines', 'title_fa' => 'سنت وینسنت و گرنادین‌ها'],
            ['id' => 179, 'code' => 'VU', 'title' => 'Vanuatu', 'title_fa' => 'وانواتو'],
            ['id' => 180, 'code' => 'GM', 'title' => 'Gambia, The', 'title_fa' => 'گامبیا'],
            ['id' => 181, 'code' => 'TO', 'title' => 'Tonga', 'title_fa' => 'تونگا'],
            ['id' => 182, 'code' => 'LC', 'title' => 'Saint Lucia', 'title_fa'=>NULL],
            ['id' => 183, 'code' => 'MC', 'title' => 'Monaco', 'title_fa' => 'موناکو'],
            ['id' => 184, 'code' => 'LI', 'title' => 'Liechtenstein', 'title_fa' => 'لیختنشتاین'],
            ['id' => 185, 'code' => 'AG', 'title' => 'Antigua And Barbuda', 'title_fa'=>NULL],
            ['id' => 186, 'code' => 'GD', 'title' => 'Grenada', 'title_fa' => 'گرنادا'],
            ['id' => 187, 'code' => 'SC', 'title' => 'Seychelles', 'title_fa' => 'سیشل'],
            ['id' => 188, 'code' => 'SM', 'title' => 'San Marino', 'title_fa' => 'سان مارینو'],
            ['id' => 189, 'code' => 'KI', 'title' => 'Kiribati', 'title_fa' => 'کیریباتی'],
            ['id' => 190, 'code' => 'MH', 'title' => 'Marshall Islands', 'title_fa' => 'جزایر مارشال'],
            ['id' => 191, 'code' => 'DM', 'title' => 'Dominica', 'title_fa' => 'دومینیکا'],
            ['id' => 192, 'code' => 'KN', 'title' => 'Saint Kitts And Nevis', 'title_fa' => 'سنت کیتس و نویس'],
            ['id' => 193, 'code' => 'BZ', 'title' => 'Belize', 'title_fa' => 'بلیز'],
            ['id' => 194, 'code' => 'AS', 'title' => 'American Samoa', 'title_fa' => 'ساموآی آمریکا'],
            ['id' => 195, 'code' => 'TV', 'title' => 'Tuvalu', 'title_fa' => 'تووالو'],
            ['id' => 196, 'code' => 'FM', 'title' => 'Micronesia, Federated States Of', 'title_fa' => 'ایالات فدرال میکرونزی'],
            ['id' => 197, 'code' => 'MP', 'title' => 'Northern Mariana Islands', 'title_fa' => 'جزایر ماریانای شمالی'],
            ['id' => 198, 'code' => 'GU', 'title' => 'Guam', 'title_fa' => 'گوآم'],
            ['id' => 200, 'code' => 'SX', 'title' => 'Sint Maarten', 'title_fa' => 'سینت مارتن'],
            ['id' => 201, 'code' => 'XK', 'title' => 'Kosovo', 'title_fa' => 'کوزوو'],
            ['id' => 202, 'code' => 'PW', 'title' => 'Palau', 'title_fa' => 'پالائو'],
            ['id' => 203, 'code' => 'MO', 'title' => 'Macau', 'title_fa' => 'ماکائو'],
            ['id' => 204, 'code' => 'PR', 'title' => 'Puerto Rico', 'title_fa' => 'پورتوریکو'],
            ['id' => 205, 'code' => 'MQ', 'title' => 'Martinique', 'title_fa' => 'مارتینیک'],
            ['id' => 206, 'code' => 'RE', 'title' => 'Reunion', 'title_fa' => 'رئونیون'],
            ['id' => 207, 'code' => 'GI', 'title' => 'Gibraltar', 'title_fa' => 'جبل‌الطارق'],
            ['id' => 208, 'code' => 'GP', 'title' => 'Guadeloupe', 'title_fa' => 'گوادلوپ'],
            ['id' => 209, 'code' => 'PF', 'title' => 'French Polynesia', 'title_fa' => 'پلی‌نزی فرانسه'],
            ['id' => 210, 'code' => 'NC', 'title' => 'New Caledonia', 'title_fa' => 'کالدونیای جدید'],
            ['id' => 211, 'code' => 'GF', 'title' => 'French Guiana', 'title_fa' => 'گویان فرانسه'],
            ['id' => 212, 'code' => 'YT', 'title' => 'Mayotte', 'title_fa' => 'مایوت'],
            ['id' => 213, 'code' => 'GL', 'title' => 'Greenland', 'title_fa' => 'گرینلند'],
            ['id' => 214, 'code' => 'FO', 'title' => 'Faroe Islands', 'title_fa' => 'جزایر فارو'],
            ['id' => 215, 'code' => 'WF', 'title' => 'Wallis And Futuna', 'title_fa' => 'والیس و فوتونا'],
            ['id' => 216, 'code' => 'SH', 'title' => 'Saint Helena, Ascension, And Tristan Da Cunha', 'title_fa' => 'سنت هلنا، اسنشن و تریستان دا کونا'],
            ['id' => 217, 'code' => 'BM', 'title' => 'Bermuda', 'title_fa' => 'برمودا'],
            ['id' => 218, 'code' => 'IM', 'title' => 'Isle Of Man', 'title_fa' => 'جزیره من'],
            ['id' => 219, 'code' => 'TC', 'title' => 'Turks And Caicos Islands', 'title_fa' => 'جزایر تورکس و کایکوس'],
            ['id' => 220, 'code' => 'KY', 'title' => 'Cayman Islands', 'title_fa' => 'جزایر کیمن'],
            ['id' => 221, 'code' => 'CK', 'title' => 'Cook Islands', 'title_fa' => 'جزایر کوک'],
            ['id' => 222, 'code' => 'FK', 'title' => 'Falkland Islands (Islas Malvinas)', 'title_fa' => 'جزایر فالکلند'],
            ['id' => 223, 'code' => 'GS', 'title' => 'South Georgia And South Sandwich Islands', 'title_fa' => 'جزایر جورجیای جنوبی'],
        ];

        DB::table('countries')->insert($countries);
    }
}
