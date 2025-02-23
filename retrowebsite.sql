-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2025 at 12:02 PM
-- Server version: 11.4.3-MariaDB-1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retrowebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_histories`
--

CREATE TABLE `back_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accepted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `history` longtext NOT NULL,
  `ability` longtext NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rules` tinyint(1) NOT NULL DEFAULT 1,
  `admin` tinyint(1) NOT NULL DEFAULT 1,
  `accept` tinyint(1) NOT NULL DEFAULT 1,
  `reason` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `accepted_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `realname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `source` varchar(255) NOT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `character_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `character_gender` enum('male','female') NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `backstory` text NOT NULL,
  `roleplay_plan` text NOT NULL,
  `storyline_participation` tinyint(1) NOT NULL,
  `storyline_plan` text DEFAULT NULL,
  `fivem_experience` text DEFAULT NULL,
  `roleplay_definition` text NOT NULL,
  `block_rp` text NOT NULL,
  `eighties_knowledge` text NOT NULL,
  `microphone_quality` tinyint(1) NOT NULL,
  `content_creator_link` varchar(255) DEFAULT NULL,
  `accept_terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `back_histories`
--

INSERT INTO `back_histories` (`id`, `user_id`, `accepted_by`, `history`, `ability`, `name`, `rules`, `admin`, `accept`, `reason`, `status`, `accepted_time`, `created_at`, `updated_at`, `realname`, `age`, `gender`, `source`, `referral`, `character_name`, `birthdate`, `character_gender`, `nationality`, `backstory`, `roleplay_plan`, `storyline_participation`, `storyline_plan`, `fivem_experience`, `roleplay_definition`, `block_rp`, `eighties_knowledge`, `microphone_quality`, `content_creator_link`, `accept_terms`) VALUES
(7, 906117941869809675, 181495203733962752, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 01:03:04', '2025-02-22 23:18:26', '2025-02-23 01:03:04', 'arqavan', 18, 'female', 'friend', 'kian', 'masume rezai', '1983-07-20', 'female', 'iran', '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', 'zan kian besham', 0, NULL, 'khir', 'aqa kin tozi dadae', 'balad nistam', '00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000', 0, NULL, 1),
(8, 576290648680824856, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 07:12:44', '2025-02-23 04:29:38', '2025-02-23 07:12:44', 'سپهر پیرحیاتی', 19, 'male', 'other', NULL, 'Ghablan whitelist dadm ', '1968-12-14', 'male', ' .', '. S s s s s s s s s s s s s s s s s s s s s s s s s z s s s s z z s s s s s s s s s s. S s s  s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s. S s s s', '.', 1, '.', '.', '.', '.', 'S s s s s s s s s s s s s s s s s s s s s s s s s s s s s s z s s ghablan role whitelist gereftam a a a a', 1, NULL, 1),
(9, 1311717713680273440, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 07:13:00', '2025-02-23 06:10:54', '2025-02-23 07:13:00', 'آرش عزیزی', 26, 'male', 'social_media', 'استریم امیر رایت شوکیس اتلانتیس گیرین', 'والتر بیشاپ ', '1965-08-06', 'male', 'آمریکا', 'والتر در یکی از شهر های کوچک امریکا به دنیا امده و زندگی خوبی در کناره خانواده خود داشته دوران کودکی او سراسر از شیطنت و بازی گوشی بچگانه بوده که این روحیه شوخ طبعی و شیطنت از کودکی به نوجوانی والتر کماکان ادامه داشته والتردر مدرسه هم ادم فانی بوده اکثره هم کلاسی های اون دوستش داشتن درسش هم خوب بوده رویای وکیل شدن را داشته اما طولی نگذشت که این رویاها برای همیشه فراموش شد چراکه در مسیر زندگی ساده و اگرچه ثروتی نبود اما ارامش و لبی خندان وجود داشت که اون هم با وجود پدری جاه طلب و فرصتجو از بین رفت.\nپدر همیشه سودای پولدارشدن را داشت پس در اخرین تلاش خود بر سره میزه قمار همه زندگی یک خانواده را باخت. از ان شب به بعد رنگ زندگی والتر ازبین رفت و تبدیل به سیاه و سفید مثل برنامه های تلوزیون شد. او باید سخت تلاش میکرد که شاید یکبار دیگر چهره مادرش را خندان ببیند پدرش را سکوت خودخوری که تمام دردهایش را به سیگارهای پشت سره هم  میگفت را نبیند .\nاز این رو مجبور به ترک تحصیل یا بهتر است بگوییم ترک رویاهایش شد و پیاپی مشغول کار در رستوران شود تا بلکه بتواند گوشه ای از این سختی هارا راحت تر کند هدف والتر دیگر وکیل خوب بودن نبود هدفش مردی مسئولیت پذیر  شد \nکسی که بتواند زندگی فراهم کند که یک رنگی داشته باشد رنگی بجز سیاهی .\nاو در تلاش است تا بدهی پدرش را تسویه کرده و در اینده برای خود رستورانی راه اندازی کند که شاید تشکیل خانواده داده و با تجربه ای که بدست اورده پدره بهتری برای فرزند خود باشد.', 'به دست اوردن یک شغل خوب و دراوردن پول برای تشکیل خانواده و کمک خرج پدر و مادر بودن', 0, NULL, 'آتلانتیس گرین و بلو.گلکسی.ایس.ایترنال . پارادایس', 'رول پلی از دید من همانند یک ماتریکس است یک زندگی در ابعاد دیگر که در این بعد دیگر شخص میتواند خود تصمیم گیرنده زندگی خود باشد مثل زندگی واقعی بوده بافرق اینکه افراد میتوانند فراتراز ان چه که هستند باشند', 'مسدود کردن یا اختلال در روند استوری لاین یا نقش افرینی یه فرد دیگر مصداق بلاک ارپی می باشد', 'در دهه 80 میلادی امریکا سیاست های متفاوتی نسبت به امروزه بوده فرهنگ ها استایل ها  ساده تر اما جذاب بوده از نظره عقاید مردم مذهبی بیشتری در اون دوران وجود داشته و حتی نژاد پرستی در ان زمان به شدت زیاد بوده نبودن فضای کافی برای روشنگری مردم باعث این امر ناشایست نژادپرستی و یا زن ستیزی وجود داشته', 1, NULL, 1),
(10, 995654074194198588, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 07:42:27', '2025-02-23 07:26:30', '2025-02-23 07:42:27', 'صدرا قاری', 17, 'male', 'social_media', NULL, 'kendrick Lynn-Wright', '1960-12-08', 'male', 'united states of america', 'کندریک در قلب یک شهر بزرگ آمریکا در دهه هشتاد میلادی به دنیا آمد. او در یک خانواده‌ی فقیر در منطقه‌ای که جرم و جنایت بخش عمده‌ای از زندگی روزمره بود، بزرگ شد. از کودکی، کندریک با سختی‌های زیادی مواجه شد. خانواده‌اش برای تأمین نیازهای اولیه‌ی زندگی تلاش زیادی می‌کردند، اما همیشه با کمبود منابع مواجه بودند.\n\n\nدر دوران نوجوانی، کندریک به دلیل فشارهای اقتصادی و اجتماعی به جرم و جنایت روی آورد. او به گروه‌های خلافکار محلی پیوست و به سرعت در دنیای خلاف شناخته شد. کندریک با ذهن تیز و توانایی‌های فیزیکی برجسته‌اش به یکی از افراد کلیدی این گروه‌ها تبدیل شد. او به زودی شروع به تجارت مواد مخدر و سایر فعالیت‌های غیرقانونی کرد.\n\n\nبا گذشت زمان، کندریک به یکی از سرکردگان بزرگ جنایتکاران در شهر تبدیل شد. او با هوش و ذکاوت خود شبکه‌ای گسترده از خلافکاران را ایجاد کرد و به ثروت و قدرت فراوانی دست یافت. زندگی کندریک پر از هیجان و خطر بود، اما او به خوبی می‌دانست چگونه از پس این چالش‌ها برآید. هرچند در دنیای خلافکاری، دوستی‌ها و روابط بسیار ناپایدار بودند، کندریک یاد گرفته بود که به هیچ‌کس اعتماد نکند و همیشه از خودش محافظت کند.\n\n\nزندگی کندریک تا پایان در دنیای جرم و جنایت گذشت. او هرگز از دنیای خلافکاری خارج نشد و همیشه با چالش‌ها و خطرات این سبک زندگی مواجه بود. اما او با قدرت و هوش خود توانست تا آخرین لحظه، کنترل امور را در دست بگیرد و به عنوان یکی از قدرتمندترین خلافکاران دهه هشتاد شناخته شود.\n\n', 'تشکیل دادن یک خانواده و تلاش برای اداره یک جاب , فعالیت های خلاف کارانه و ارپی کردن با دیگران , برگزاری مسابقات غیر قانونی مثل فایت کلاب و...', 1, NULL, NULL, 'atlantis blue , atlantis green , nexone , ace , void , future ', 'یعنی بی اهمیتی به نقش افرینی دیگر پلیر ها و ربط دادن مساعل ic به ooc', '\nنوع سلیقه و فرهنگ و هنر تغییر کید و موسیقی های west coast و east coast مشهور شدن که در این دوران گروه nwa خیلی مشهور شد . \nدهه هشتاد با پیشرفت‌هایی مانند رایانه‌های شخصی، اینترنت، و تکنولوژی‌های جدید در زمینه‌های مختلف شروع شد. این پیشرفت‌ها باعث شد تولید و کار روزمره به شکل‌های جدیدی تغییر کند.\nدر این دوران امریکا درگیر جنگ های مختلفی بود از جمله جنگ ویتنام\n', 1, NULL, 1),
(11, 941605247183388742, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 08:06:23', '2025-02-23 07:56:30', '2025-02-23 08:06:23', 'مهدی فرهنگ', 38, 'female', 'friend', 'من با Arthas سرور رو شناختم', 'Charles Grayson', '1950-01-15', 'male', 'شیلی', '\nسال 1950 در کشور شیلی بدونیا امد . سال های اول زندگیش رو مشغول به  کار داخل یک رستوران نزدیک پایتخت شروع کرد با زحمات  زیاد وارد دانشگاه  کانسپسیون شود. و داخل رشته شیمی کاربردی مشغول به تحصیل شود زمانی که به سن 30 سالگی رسید با سطح دانشی که داشت تلاش کرد که به امریکا و به لوسانتوس مهاجرت کند.', 'من چون در زمینه دارو سازی و پزشکی و شیمی  دانش دارم میخوام که رول پلی یک  پزشک  که در دارو سازسی و شیمی  فعالیت  کنم', 1, NULL, '2سال داخل سرور اتلانتیس بازی کردم', '\nساخت یا بازی کردن یک شخصیت  خوب و متفاوت', 'همراهی نکردن با بقی پلیر ها', 'سطح دانش شیمی و پزشکی  درحد شناخت امونیاک. واتیلن گیلیکول بوده برای همین بشتر بیماری ها مثل پرگی دیسگ. شکستگی اسپاینال کورتس. وغیره باعث مرگ یا قطع عضو شده برای همین در ان دهه دولت امریکا دنبال حل این مشکل ها بود و برای همین از تمامی  کشور ها مهاجر پزشک یا داروساز به عنوان مهاجر اورده\n', 1, NULL, 1),
(12, 843829837780222003, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 08:07:10', '2025-02-23 08:06:22', '2025-02-23 08:07:10', 'محمد معین ', 18, 'male', 'social_media', NULL, 'Jason blood ', '1960-03-25', 'male', 'دو رگه ایرانی آمریکایی ', 'تو ۱۸ سالگی Jason با برادرش Wayne که ۳ سال از خودش بزرگتر بوده با پولای پس‌انداز پدرش که ارتشی بوده میرن امریکا Liberty city \nاونجا برادرش توی یه آپارتمان داخل Broker رو به روی s\'wishe pizza یه اتاق گرفت و جیسون رو فرستاد توی پیتزا فروش کار کنه و خودش نوچه مافیای ایتالیای توی little Italy بود و کارای کوچیک و کثیفشونو انجام میداد\nبعد از ۳ سال هزینه ها زیاد شده بود و وین از خونه رفته بود و جیسون تنها زندگی میکرد و از زمانی اومدن امریکا کامل ارتباطش با والدینش قطع شده بود و هیچ خبری نداشت ازشون \nجیسون رو از پیتزای انداختن بیرون چون جیسون دیگه نمیتوست حرف و توهین های نژادپرستانیه ریسش رو تحمل کنه و باهاش درگیر میشه و جلوی همه با یه هوک راست بی هوشش میکنه\n کرایه اپارتمانش ۲ ماه عقب افتاده بود و مجبور شد از وین کمک بخواد که یه کاری بهش بدن اونجا\nوین با چرب زبونی تو این ۳ سال تونست بشه راننده شخصی don و تونست راضیش کنه جیسون رو به عنوان loan shark عضو خانواده کنه و جیسون تا ۲۵ سالگیش عضوی از خانواده بود و به اندازه کافی پول جمع کرده بود که بتونه شهری که مادر پدرش ماه عسل رفته بودن و مادرش همیشه از حسو حال و زیبای شهر براش تعریف میکرد بره los Santos شهر رویایی جیسون، یه شانس دوباره که بتونه از صفر شروع کنه\nبه وین گفت که میخواد فرار کنه ولی اون بهش اخطار داده بود روزی که خواست عضو این خانواده بشه هیچ راه برگشتی نیست ولی جیسون دیگه نمیتوست تحمل کنه این شهر بزرگ و بی‌روح رو و به هر قیمتی که شده فرار کنه\n\nیک شنبه ۲۴ مارچ ۱۹۸۵ یک روز سرد مه الود\nجیسون بعد از پایان کارش توی خیابون Carson کنار خیابون ماشینشو پارک کرد و ساکشو برداشتو یه تاکسی گرفت و مستقیم رفت سمت فرودگاه\n با اخرین پرواز ذفت به لوس سانتوس و پشت سرش هم نگا نکرد\n۲۵ مارچ توی فرودگاه لوس سانتوس با اولین تاسکی رفت رفت سمت پلتو the bay bar و اونجا یه نخ سیگار روشن میکنه با یه بطری ابجو و پن‌کیک موزی که سیگارشو جای شمع گذاشته روش تولد ۲۶ سالگیشو میگیره.\n\n\nجیسون بیشتر پولای که تو این ۷ سال جمع کرده بود رو برای وین گذاشت که اگر یروز خواست اونم بتونه بیاد پیشش و باقیش رو برای سفرش و ساخت یک زندگی جدید برداشت برای خودش', 'یک کارآگاه خصوصی با گذشته نامشخص که خیلی اجتماعی نیست و فقط پرونده‌های عجیب و مشکوک اشخاص گم شده رو قبول میکنه.\n\nخیلی نمیدونم باید ببینم چی هست تو سرور\n۱۰۰٪ ساید خاکستری ', 1, NULL, 'دایمند ولی اگه منظور هیوی ارپی هست آتلانتیس بلو الانم تازه رفتم ایس', 'برای من اون زندگی ایده‌آل که نمیتونم تجربه کنم\nجوری که انگار خودم دارم جای کارکتر زندگی میکنم', 'جلوگیری از نقش افرینی\nنزاری یکی سناریوی که چیده رو انجام بده و همش سنگ بندازی جلو پاش \nفکنم این باشه نمیدونم', 'سری فیلم های back to future و سری فیلم های top gun و سریال strange things\n بازی Yakuza 0 یا \n street of rage , gta vice city, vice  city stories , hotline Miami یا بازی Friday the 13th البته یاکوزا تو امریکا نیست\nفشن دهه ۸۰ موسیقی جذابشون و بند های guns n roses , ac/dc , Metallica و هالیود دهه ۸۰', 1, NULL, 1),
(13, 550279208958427138, 683668333224394798, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 09:17:22', '2025-02-23 08:52:26', '2025-02-23 09:17:22', 'سامان عبدالهی', 22, 'male', 'friend', NULL, 'کارلوس سانچز', '1111-11-11', 'male', 'ا', 'ااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااا', 'ت', 1, 'اااا', 'ا', 'اااااااااااااااااااااااااااااااااااااااااااا', 'ااااا', 'اااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااااا', 1, NULL, 1),
(14, 956088436622770226, 298452867654615040, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 09:50:04', '2025-02-23 09:36:03', '2025-02-23 09:50:04', 'ارشان حیدری', 17, 'male', 'friend', 'oceanslikebehrad', 'Joseph Edwards', '1957-05-27', 'male', 'آمریکا : ایالت سن آندرس : گرپ سید', ' پدرش کار می کرد جوزف جوان با دوست های خود وقت می گذراند \nروزی دوست جوزف به او پیشنهادی داد و گفت من با کار هایی که در شهر های اطراف انجام می دهم پول زیادی دراوردم جوزف تصمیم گرفت به همراه او رفت دوست جوزف آنها را برد در یک مغازه در اطراف شهر پلتو بای دوست جوزف یک چاقو به سمت مغازه دار گرفت و به جوزف گفت دخل آن مغازه را خالی کند جوزف با اینکه ترسیده بود این کار را انجام داد آنها از آنجا فرار کردند, جوزف با خود فکر کرد با این راه می تواند پول زیادی به جیب بزند و به دوست خود گفت ...', 'جوزف ادواردز به عنوان یک دزد شروع به کار می کند و سعی می کند پله پله به اهداف بزرگ تر برسد', 1, NULL, NULL, 'نقش آفرینی در قالب یک کاراکتر', 'با آرپی نکردن با یک کاراکتر یا یک روند آرپی بدون دلیل مثال : من درمکانیکی کار می کنم و یک نفر برای تعمیر می آید و به آن فرد بی دلیل سرویس نمی دهم', 'در دهه ی 80 یکسری وسایل تولید نشده بود مثال: موبایل لمسی - یا صحبت درباره ی وقایای بعد از 1986 مثال : انتخابات ترامپ - صحبت درباره ی تیک تاک - آتش سوزی لوس آنجلس . آرپی ها باید با اخبار همان روز ها باشد مثلا جنگ سرد بین آمریکا و شوروی', 1, 'https://www.twitch.tv/arshan_tibon', 1),
(15, 1004788269139103856, 298452867654615040, '', '', NULL, 1, 1, 1, '', 2, '2025-02-23 11:53:07', '2025-02-23 11:35:53', '2025-02-23 11:53:07', 'پویا قاثدی فر', 21, 'male', 'other', NULL, 'edison shark', '1958-09-09', 'male', 'usa', 'ادیسون شارک متولد ۹سپتامبر ۱۹۵۸ در سیاتل واشنگتن متولد شده است\nاو از بچگی کمی بیش فعال بود و زیاد شیطنت میکرد. یک برادر داشت و به اون خیلی وابسته بود . با خانواده خود یعنی پدر و مادر و برادرش در سن ۱۸سالگی به لوس سانتوس مهاجرت کرده بودند.\nاو در سال ۱۹۷۹ به رم مهاجرت کرد تا در دانشگاه ساپینزا که یک ذانشگاه قدیمی و معتبر در اروپا بود مشغول به علم طبابت شود\nدر سال ۱۹۸۵ از دانشگاه فارغ التحصیل شد و برای ادامه ان نیز در اونجا فعالیت کرد اما به دلیل فوت برادرش مجبور به برگشت به لوس سانتوس شد\nعلاوه بر اون در نظر داشت که بعد از تحصیل نیز به لوس سانتوس برگردد تا در شهر فرصت ها خود را نشان دهد اما سرنوشت اون رو زودتر به اونجا برگرداند', 'میخوام که در ام دی فعالیت کنم و به عنوان دکتر ام دی ارپی انجام بدم', 1, NULL, 'atlantis green and blue', 'تا جایی که میدونم یعنی اینکه در نقش اون کاراکتری که ساختیم زندگی خود رو در شهر مجازیمون ادامه بدیم و با دیگران همونطور که در دنیای واقعی معاشرت و برخورد میکنیم و هرکاری که انجام میدیم در رول پلی هم همونطور باشیم', 'خیلی خوب نمیدونم اما به نطرم اینکه از ارپی یک شخص دیگه حمایت نکنیم یا پارازیت بندازیم یا سوتی بدیم که ارپی شخص خراب بشه', 'کمبود تکنولوژی پیشرفته مثل الان\nوجود انسان ها بیشتر در بار ها برای معاشرت\nوجود گروهک های موتور سواران\n\n', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-bars',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `built` tinyint(1) NOT NULL DEFAULT 0,
  `with_acl` tinyint(1) NOT NULL DEFAULT 0,
  `with_policy` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `name`, `model`, `route`, `icon`, `active`, `built`, `with_acl`, `with_policy`, `created_at`, `updated_at`) VALUES
(1, 'User', 'App\\Models\\User', 'users', 'fas fa-bars', 1, 1, 1, 0, NULL, NULL),
(2, 'Transaction', 'App\\Models\\Transaction', 'transactions', 'fas fa-bars', 1, 1, 1, 0, NULL, NULL),
(3, 'Tire', 'App\\Models\\Tire', 'tire', 'fas fa-bars', 1, 1, 1, 0, NULL, NULL),
(4, 'History', 'App\\Models\\History', 'histories', 'fas fa-bars', 1, 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_30_162617_add_expire_at_column_to_user', 1),
(6, '2022_08_30_163515_create_tires_table', 1),
(7, '2022_08_30_175626_add_active_from_column_to_users', 1),
(8, '2022_08_30_999999_create_cruds_table_easypanel', 1),
(9, '2022_08_30_999999_create_panel_admins_table_easypanel', 1),
(10, '2022_08_30_999999_create_roles_table', 1),
(11, '2022_08_31_015536_create_transactions_table', 1),
(12, '2022_08_31_094228_add_pakcage_id_to_users', 1),
(13, '2022_08_31_112540_add_column_to_transactions', 1),
(14, '2022_08_31_124128_create_jobs_table', 1),
(15, '2022_11_28_093213_create_back_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `panel_admins`
--

CREATE TABLE `panel_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panel_admins`
--

INSERT INTO `panel_admins` (`id`, `user_id`, `is_superuser`, `created_at`, `updated_at`) VALUES
(1, 658445453569818646, 1, '2025-02-22 20:02:10', '2025-02-22 20:02:10'),
(2, 298452867654615040, 0, '2025-02-22 20:45:20', '2025-02-22 20:45:20'),
(4, 683668333224394798, 0, '2025-02-22 22:42:58', '2025-02-22 22:42:58'),
(5, 181495203733962752, 0, '2025-02-22 22:43:22', '2025-02-22 22:43:22'),
(8, 906117941869809675, 0, '2025-02-22 23:11:35', '2025-02-22 23:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'a:2:{s:10:\"fullAccess\";b:1;s:7:\"admin.*\";b:1;}', '2025-02-22 20:02:10', '2025-02-22 20:02:10'),
(2, 'admin', 'a:1:{s:15:\"panel.histories\";a:1:{s:4:\"read\";s:1:\"1\";}}', '2025-02-22 22:44:50', '2025-02-22 22:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 658445453569818646),
(1, 298452867654615040),
(1, 683668333224394798),
(1, 181495203733962752),
(1, 906117941869809675);

-- --------------------------------------------------------

--
-- Table structure for table `tires`
--

CREATE TABLE `tires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `expire` tinyint(3) UNSIGNED NOT NULL DEFAULT 30,
  `discord_roll_id` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tires`
--

INSERT INTO `tires` (`id`, `name`, `expire`, `discord_roll_id`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bronze Subscriber', 30, '1337397902884081736', 150000, '2025-02-22 23:24:43', '2025-02-22 21:30:42', '2025-02-22 23:24:43'),
(2, 'Silver Subscriber', 30, '1337398135089139822', 300000, '2025-02-22 23:24:42', '2025-02-22 21:31:19', '2025-02-22 23:24:42'),
(3, 'Gold Subscribe', 30, '1337398293432369173', 500000, '2025-02-22 23:24:41', '2025-02-22 21:32:02', '2025-02-22 23:24:41'),
(4, 'Platinum Subscriber', 30, '1337398593920700478', 800000, '2025-02-22 23:24:39', '2025-02-22 21:32:55', '2025-02-22 23:24:39'),
(5, 'Premium Access', 30, '1337399107760685096', 99000, '2025-02-22 23:24:34', '2025-02-22 21:33:36', '2025-02-22 23:24:34'),
(6, 'حمایت از سرور ', 7, '1340706895425699952', 100000, NULL, '2025-02-22 23:49:08', '2025-02-22 23:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL DEFAULT uuid(),
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_tire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `visitor` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_pay` tinyint(1) NOT NULL DEFAULT 0,
  `result` varchar(255) DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uuid`, `user_id`, `tire_id`, `last_tire_id`, `visitor`, `amount`, `discount`, `is_pay`, `result`, `trans_id`, `created_at`, `updated_at`) VALUES
(1, 'c183ac53-714c-4c2d-9359-f89a9493fb3b', 489466246610288640, NULL, NULL, '192.168.50.1', 100000, 0, 0, NULL, NULL, '2025-02-22 20:55:59', '2025-02-22 20:55:59'),
(2, '836825fd-d26b-4b23-95fa-12ebf54e22ac', 489466246610288640, NULL, NULL, '192.168.50.1', 10000000, 0, 0, NULL, NULL, '2025-02-22 21:28:30', '2025-02-22 21:28:30'),
(3, 'cf0618aa-73e2-41af-ab95-41ceec8537d8', 298452867654615040, NULL, NULL, '192.168.50.1', 1000000, 0, 0, NULL, NULL, '2025-02-22 21:28:37', '2025-02-22 21:28:37'),
(4, '31897518-fe2e-4e21-85b9-e8a85fa861cf', 298452867654615040, NULL, NULL, '192.168.50.1', 100000, 0, 0, 'پرداخت ناموفق', 'A000000000000000000000000000pyxxy6ye', '2025-02-22 21:29:11', '2025-02-22 21:29:45'),
(5, '50259681-51bf-4a4e-9d9a-224ac52e6532', 489466246610288640, 1, NULL, '192.168.50.1', 150000, 0, 1, 'پرداخت تکمیل و با موفقیت انجام شده است', '65937467601', '2025-02-22 21:58:02', '2025-02-22 21:59:09'),
(6, 'a5326dd2-e2c1-4738-a88b-0475ea05782b', 489466246610288640, 4, 1, '192.168.50.1', 650000, 150000, 0, NULL, 'A000000000000000000000000000jjnn162z', '2025-02-22 21:59:54', '2025-02-22 21:59:54'),
(7, 'c44650ae-1f18-46e5-9977-95b926da40f9', 683668333224394798, 1, NULL, '192.168.50.1', 150000, 0, 0, NULL, 'A000000000000000000000000000mr33m3dd', '2025-02-22 22:42:46', '2025-02-22 22:42:47'),
(8, '74286c81-0586-4d63-b040-bce263c44d3c', 843829837780222003, 6, NULL, '192.168.50.1', 100000, 0, 0, NULL, 'A000000000000000000000000000derrx188', '2025-02-23 08:08:12', '2025-02-23 08:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `discriminator` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `verified` tinyint(1) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `mfa_enabled` tinyint(1) NOT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `expire_at` datetime DEFAULT NULL,
  `active_from` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `discriminator`, `email`, `avatar`, `tire_id`, `verified`, `locale`, `mfa_enabled`, `refresh_token`, `expire_at`, `active_from`, `created_at`, `updated_at`) VALUES
(181495203733962752, 'abandoned_music', '0', 'shayankh450@gmail.com', '062c50ed48930162fc396125d4494192', NULL, 1, 'en-US', 1, 'eyJpdiI6InVkZUJzTldJd2ZnV3I0N3BlSnpNYVE9PSIsInZhbHVlIjoiTWk5WENsT2dPY3p0UmZQb3ZoZlNCbzFVUTUzTGNzcHNvN3IvQW1aSCtKdz0iLCJtYWMiOiI5N2E4ZTY0MmRmZDhiODM1M2E5M2YxNjQ4MmFhN2MwYTdjOTlmOTYyZDU5MTk1MTUxMmEwYmQyODY5ZmVmNDg4IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 22:20:56', '2025-02-23 10:45:04'),
(298452867654615040, 'mo13ammad', '0', 'mohammadsaadati74@gmail.com', '6b99bc2d877089c31b3fffa679ef3cd4', NULL, 1, 'en-US', 1, 'eyJpdiI6IkJORlJ2blR3MUZPRkJsdlhISnZmVXc9PSIsInZhbHVlIjoiVDMzSHVQODNMSmVkMGg5NDdTcXd6cHRBcGRCRXk4UFM1a21pTS9MSzZlRT0iLCJtYWMiOiI2ZjZjMTFkNjg1MmFhOTg1NzAwNjNhMzQ2MjUxNjJlMWNhZWQ4NWZhMWVmYmJjNDIyZmI5ZjBkYjYyMmViNTM2IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 20:45:01', '2025-02-23 11:52:45'),
(302437886161190913, 'arian7ae', '0', 'ehteshamiarian@gmail.com', '78d3e1ef1d37f242a7832ead254a50c4', NULL, 1, 'en-US', 1, 'eyJpdiI6IkhRazVicGtkbUJwcXZrZXQ2dlArbEE9PSIsInZhbHVlIjoiQWdqcTlzWERvano2VCtiZzhoN1pLdmM5aC82VVE1Q3N4eitidWdHY1pWUT0iLCJtYWMiOiI0MTBmMTRjOGQyOTA1YTdiYzRmZGE1MDY3NDU5Yjc2ZGFiOTA2YzI3NzlhOGJiYzJmNWFjZGZhNDg3MmI5Y2EzIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:36:35', '2025-02-22 23:36:35'),
(377874001139204097, 'mmdexorcist', '0', 'mghkli@gmail.com', '02e0fef2fff2588c68ca680c4ca8161e', NULL, 1, 'en-US', 1, 'eyJpdiI6IjhIZ2d4WU9La2d0VVkwRU1ncEFRZWc9PSIsInZhbHVlIjoiWGtvL3JVUGpWTFNyc2RNdld5WXNnaHlRbk5DNkZFUkt6QjhiNHFuSHl3OD0iLCJtYWMiOiIwYzdhM2Q2MDM2MzU3ZjYzYWYxYjIxOWMyYjE3YmU3YmZmYjAzODZmMDEzZmIxMzgwYmUwODkyZjJjYWQ0MDMxIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:45:04', '2025-02-22 23:45:04'),
(393362383118008320, 'parsa_0', '0', 'sparsamolaeee@gmail.com', '5496dabe1fa74ebd8534466db9071357', NULL, 1, 'en-US', 1, 'eyJpdiI6IkxOMVpHbzc3R3ZXcGw3clBtK2dldEE9PSIsInZhbHVlIjoib1JXZ0kxN3YvZmtHcDQ1OUpSZTBYTlZaTERzeGM3SkI3dGJHR0YvTzAyQT0iLCJtYWMiOiI5NzFjNjA2N2VjN2JmMmM5YWM2NDc0OGUwZTYzZjhmZmI4MTgwZjllYjQzMmJhOTM4NGFlZDNkNGViNzc0MDU4IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 06:10:46', '2025-02-23 06:10:46'),
(414402633462185998, 'parhamabbasi', '0', 'abbasii.parham@gmail.com', 'e83ca229a6ad8210b8d248e1de701750', NULL, 1, 'en-US', 1, 'eyJpdiI6IkZpR0szdmY4d2JJR2h2TkYxL3RmaHc9PSIsInZhbHVlIjoicjRPY3hSa1p6REUybHRIM2FTd3JQdUNiZjdzSmN2K2xzeVJNOC9QblZNdz0iLCJtYWMiOiIwYWQyNDU5MGYzZDVjZTViMzJkNGM0ZDkzNWU2ODQyYmUzMjAzN2JjZjUxYmQ2ZDBiNzY4NTU5NTc0NmE3NjYzIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 11:54:35', '2025-02-23 11:54:35'),
(426998169935544324, 'mh.z', '0', 'mhzunit@gmail.com', '8002662f88a339ccfa8f8682a19c76e1', NULL, 1, 'en-US', 1, 'eyJpdiI6Ims4dlplQmI1RkNHTzBmUWdYbmZVR0E9PSIsInZhbHVlIjoicTVwRmdFRTROTHJmNVZINW9TQlMrWkVPYUlLYnBXTWxiMHA4MmxEZVpwTT0iLCJtYWMiOiJlOTVhYjg1MjU3ODI0YTdmNzNmNTVkNmZmZTM1ODUxNWQ0MmFkYTA4MjcwZTRiMWE3NmQzM2I0NjNkZmJkMzZjIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 05:16:19', '2025-02-23 05:16:19'),
(454314642269798430, 'alink11', '0', 'sirantop84@gmail.com', '226d1b3c52a45d1a6faeb4ff378273d5', NULL, 1, 'en-US', 0, 'eyJpdiI6IldLNjg5VVU1Ryt6QWxmUlhSclVueFE9PSIsInZhbHVlIjoiTE5zTWFxYmVJelp6Mk5LN3l5em0raHFmN01CbnZLWnBxZzZPWHQxbWlCST0iLCJtYWMiOiI5ZTZlY2IyOWFmYTFjMzc1ZmJmMjhmZjhmZGIwYTBmOWMzZDQ3MzY0MjdhNzA2YmJiY2VhYmFmZmM5Y2Q2MDIwIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:48:24', '2025-02-22 23:48:24'),
(485578530114240512, 'mmd0083', '0', 'gamemohamad83@gmail.com', '840b7ad788efcafe1eb49c6979ee1753', NULL, 1, 'en-US', 1, 'eyJpdiI6IldabVlPVlgvY3FmR2lURmRqWFhUUFE9PSIsInZhbHVlIjoieUNKQ3c1RjVkVVBDNVBibTVyUjJCelRKb3hnN2tPbnVFSXpyZEhZNVMzMD0iLCJtYWMiOiI3YjI5NWUzYWYwYWU0ZWJkNmU3ODQxMDZlMzE5OGQ5YTk4OWFkY2JlYmNiNjI3ZTc3NzlhM2U0YWNhOGMwOTM0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 00:02:22', '2025-02-23 00:02:22'),
(488386361368510484, 'sheykhamir', '0', 'star2015amir@gmail.com', 'f0a7b4029481ded33c1a210bee19adb2', NULL, 1, 'en-US', 0, 'eyJpdiI6IityRStwTHk4Yk93Zm9jZDk4TGRaY0E9PSIsInZhbHVlIjoiM3pkTmxGbWF5NW9KRUhGalBwQmxGd0ZKSzVjY0Y3U2Qyb29kSTNyWTM0MD0iLCJtYWMiOiI2NTUzNTVlMDAzZjg1YzI5NGU0YmY3OTNkNTExMzcxNzM3ZDNhYTBhNzJjNzBkYzFjY2Y5ODE2ODQxY2EyOTYyIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:36:46', '2025-02-22 23:37:49'),
(489466246610288640, 'dayous', '0', 'komakmikham2@gmail.com', 'ed5ea4855c39b3cec8dc0e68dde8a285', 1, 1, 'en-US', 1, 'eyJpdiI6InY5c2RiT0pVWWxsVW9XZGh6VXhMVHc9PSIsInZhbHVlIjoiYXRNRnFQbFpSOWZYRzBvaGxGeHhkQUJlTzUrRDJOYUFtK0hGamRIckhFST0iLCJtYWMiOiI0NDQ4YWU1MWM2OTM3N2UwYmI0ZGRkNWFiNzUyYjcwYjhiMDUxMTU3N2NiMWY0ZWMzYmUxY2U1ZDZhNzM0NWIyIiwidGFnIjoiIn0=', '2025-03-25 01:29:09', '2025-02-23 01:29:09', '2025-02-22 20:54:18', '2025-02-22 21:59:09'),
(491245815537336331, 'hamrez', '0', 'hkarimi561@gmail.com', '30fdee73bbefb2def1987ceab12d61e4', NULL, 1, 'en-US', 1, 'eyJpdiI6IkZFMVhmdk1JalB3Um5BakRTTnRQSFE9PSIsInZhbHVlIjoiRnJVYXFRbnQxc1ZGNXNOaHN4Q2lsdkpTcWp5VXdqcEFqVlZlcmY4dzF1RT0iLCJtYWMiOiJiNzg0NDRhYzA5MDg0NTE3MDZmYTRmNzUzNWNhYTVjNjY1YjA5ZDViYzYwYmQ0MTJmNjcwMjk0NmY4OWZjZjRlIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 06:19:01', '2025-02-23 06:19:01'),
(506210728680751106, 'alim305', '0', 'mosaviali2016@gmail.com', '63f76ed6dc96cfdbcd8e8b0f19867226', NULL, 1, 'en-US', 1, 'eyJpdiI6IjlZZ0FCbGZsTkYyc3U3aEdqOXQzN3c9PSIsInZhbHVlIjoiNWJvRXcvWUxjMERDQ0FvbHd6WmlmL21nMFVLOWR3M0FjZEc4bDVrYytjQT0iLCJtYWMiOiI3NDgwMWNlMWQ4ODU3MzM0MjU4NDllNDE0NjRlMWQ3NGJhOTQzZTA0M2NkZDlmOTc1YjlhZjNhOTIzMmQyMjkwIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 02:52:11', '2025-02-23 02:52:11'),
(522832674474295317, 'robat5031', '0', 'aszxeffdd@gmail.com', '69ae7d3d998167ad67bf6e26c5e5545c', NULL, 1, 'en-US', 0, 'eyJpdiI6IndSZStmUklPcm5hTHFqc25jTlRQNHc9PSIsInZhbHVlIjoiNVJrMC8rYXZkNU9TTEhna0hUWlU0QVEvM25xWGUvNWNaaUpPQ3BmRHl0VT0iLCJtYWMiOiIwOThhNzdjNTdmMWRkZjE2NTkwMGE4ODY2MjQ3ZmU1YWIxZjgxZGY5YzQ2YzM4YmM4NjUwMzA2YTcwZWVkOTc2IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:37:31', '2025-02-22 23:37:31'),
(550279208958427138, 'saman30', '0', 'samanminer2413@gmail.com', 'dfd67a688b2f294360a530c14aec327d', NULL, 1, 'en-US', 1, 'eyJpdiI6IktKV0V5SUVkb214WlRsRlQwTVRUUWc9PSIsInZhbHVlIjoic0pBc2JacUprZVZpQTFnNjIzS3B5d25ZYXRYclppVCtsUHBDbjZHNytNMD0iLCJtYWMiOiJiMDBkZDQ2YjQ2NTk1ZDY4MWY2ZGUwNmM5NDI4YzIwNTk1MTU1ZmQyMWVmMjMwYWViODkwYWIxM2RhM2MzY2Q5IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 08:38:30', '2025-02-23 11:44:46'),
(563422195746078741, 'reza_mt', '0', 'rezamatini133@gmail.com', '4da728f31f761dee22877c01aedcdb55', NULL, 1, 'en-US', 1, 'eyJpdiI6InpuM0I4dU1nNzB3bzlQMmFzdHVjVlE9PSIsInZhbHVlIjoiaURnSmtNQU9KT2tLRGcrV3ZRTlQySU5CREJvSzVZTU5BVDUwOWg4NC90WT0iLCJtYWMiOiI3YzJhZDg5NmQyOTMwNDdlMTY4NTI0ZDdkMWNmM2Q5YzUwYzllMzNjN2FkMTE1OWYxNTljMjA1NTcyY2E0ZDIzIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 08:08:31', '2025-02-23 08:08:31'),
(574897559794089986, 'monsterboy', '0', 'noorbaryazd@gmail.com', 'a70f8f5579fc3ce93265224664690427', NULL, 1, 'en-US', 1, 'eyJpdiI6Iis4U0FONG5ONEsybGluRDlPclNZN2c9PSIsInZhbHVlIjoiSi9wQ3E1RGlvdWJES3JHZDN1Y1pLVFgraElWZXA2cXk1RzdBZnBES1l3az0iLCJtYWMiOiJmMzJiN2QxMWM3NjhkZjZlYTJjYzUzNmZhNWM2YTg2MmQxYmFhZDE5MjIxNjM1ZjhhMTE1NTdmNGVjMDY3YmQ5IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 08:28:30', '2025-02-23 08:28:30'),
(576290648680824856, 'sepi.i', '0', 'davodppk@gmail.com', 'f1853b55abddf4e82e2fe00c4162f6ee', NULL, 1, 'en-US', 0, 'eyJpdiI6IkYwbDhlYTdHVEcyaXllTThhQ3ZxVVE9PSIsInZhbHVlIjoienhrMlRwcUxZb0s0a1JIQnZFRjFyZ3VoeFQvV2doSVVhOUZVbnE1THJMOD0iLCJtYWMiOiJhOGI0ODkzMmY2ZjE4YzllZTdlMmZiZWFlZmJiNGQzODExMmFiYjg5MGIyNTY1OTBhNTllY2IxYmRjYTQwNDRkIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 03:33:53', '2025-02-23 07:15:56'),
(605221796870094878, 'legacyofmine', '0', 'mohammadjm52@yahoo.com', 'bfe450594e100bc3e836d00ea3ef1d8a', NULL, 1, 'en-US', 1, 'eyJpdiI6InRHaUZOdDFIVktrR1p6aW1LT2p1TWc9PSIsInZhbHVlIjoidU8vcndvSEt3U0R5QkN5K2JmQlBReUowSTN1OEdOWEF1VGlnNFkxaTBIYz0iLCJtYWMiOiI5M2MyZDU1OGZhNDlhMTZkNWMzNWQ5YzFmNGZjNDU4MWFhNjc3ZjI4YWM1MzA3MzQ4MDBmZmZmYzdmNDExZmVmIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 10:51:33', '2025-02-23 10:51:33'),
(613481559680483439, 'darkronnin79', '0', 'hajbahramian79@gmail.com', '388bdb4e4dd0e1d65c0da13b262c3553', NULL, 1, 'en-US', 0, 'eyJpdiI6IjVFRnFvcDN2ZVh3dzZJQW5JTkc4UXc9PSIsInZhbHVlIjoiRzB3RkUzbDM1UnZHNHVWT0VaTUNzYXdyaHJ2TFZaaXQwbWhMSkQxOVl2UT0iLCJtYWMiOiIxZDU3Y2E0NWY1OTQwOTJmNjg2M2RkOGZjMjE1NmE3YTY2ZTYxODIzYWE3NWQwMDNlOGU5NTFkZGFiYzM4ZWRlIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:43:44', '2025-02-22 23:43:44'),
(619205031085998082, 'oceanslikebehrad', '0', 'b.shz2005b.shz2005@gmail.com', '1845627d506c4b8b668071c20ed9a2ea', NULL, 1, 'en-US', 1, 'eyJpdiI6Ik5hRDVEaUpvTG1PdFk2UER6ek1ibXc9PSIsInZhbHVlIjoiVXlsSWtkUGF5Uk9SSWRIZmFYZ0F5NzFEeFdDcTkrOUZ2NXlReTA0NWNqMD0iLCJtYWMiOiJiOGJhZTYxNjdjOTJlYTE2NWMzYjU1NmU2YWY3OGVmNzYxMzlhZDY1YTdkZmRhNTUzMDU0OWIxNTZjMTljNWY0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 00:46:53', '2025-02-23 11:30:05'),
(653997175692591134, 'hybridsami', '0', 'avoaough@gmail.com', 'c6fa83c1afa112f038eb4a985bf31184', NULL, 1, 'en-US', 1, 'eyJpdiI6IlFxVGFmQWlsaHlsRjhXM2VKakIyZ2c9PSIsInZhbHVlIjoid1ROc01LZEFoY1htbElpZWViNFcvYTdjWlZJbWRqd3Z0RWVJNnhCdHY4MD0iLCJtYWMiOiI3MzIxZjc2ODMyMmQwZmQzZGUyMTJiNTExNWVjZjE1NDNiNjA2NGZhOGQzODc0ZTYyN2ZkMjIxMzE2ZjI3YWU0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:38:40', '2025-02-23 01:26:59'),
(658445453569818646, 'yeganehha', '0', 'ytest.ir@gmail.com', 'd9fb657b0c7f49864fb81263b6723930', NULL, 1, 'en-US', 1, 'eyJpdiI6IjV1clFQcEhXQ2Fpd0QvRkVGUlVPMGc9PSIsInZhbHVlIjoidnpkTTc0bXJLUmE2dFV1VmUyMGJzMmE4T2lYNWRyTWxxQUdGdnBmNmpvUT0iLCJtYWMiOiIwYWQyZmZmNTdiYTIyM2U0NTZjOGFkZGY4ZTAwZTJhN2NmYjRjMjUxYjU4YTAzMzJlYzIyZjMxNjVlNWE0MjM0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 20:01:18', '2025-02-22 20:01:18'),
(662043047533740080, 'ehsansml', '0', 'www.ehsanshirmohammadli91@gmail.com', '3565efb254d1b1e8be282af5f5ab532b', NULL, 1, 'en-US', 1, 'eyJpdiI6ImdXeHU4OHhscmRvWHkyRDVtaC83cXc9PSIsInZhbHVlIjoiNkRodEd6OHZmVzFxS2xjdEl3eUw0UTZ4WTdZSVZwMmJmVjQ4QS9ucDZyZz0iLCJtYWMiOiJjYmJjYjAwOTQ5NzQ2NjYwNWQwNjBhYmM1MDU0NDQxZDRjODUzMTRkNmQ2YmJlODE5NTZlN2IwOTNhZTBlMmNmIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:42:44', '2025-02-22 23:42:44'),
(683668333224394798, 'castiel_angelic', '0', 'alirezahannan46@gmail.com', '7bcee548ea74d9c7afb458fc3751c644', NULL, 1, 'en-US', 1, 'eyJpdiI6IlB1S3FySUZieUkya21MMGdWR2p0blE9PSIsInZhbHVlIjoiVFcrcGI3bW1CTGlGRythL0I4bVRlK050Nnh4Myt6ekNtVjlBV0docXNJcz0iLCJtYWMiOiIxOWRiYTM5MTE3N2NlZDBlMWMyNjU0ZmFiMjVmMzYzZTM0MWJlYzNmNGVmYzAxYWEzNDBjYmQ5ZjIzZTY1NTZkIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 20:54:50', '2025-02-23 09:17:06'),
(692034204078440459, 'dalghakpir', '0', 'shervin99h@gmail.com', '78f21062ac4b3431789018d5a4c1973f', NULL, 1, 'en-US', 1, 'eyJpdiI6IlkzRnVoZWtPZThBVUtxbkQ0eGZLU2c9PSIsInZhbHVlIjoiOXpKWCsyQzlod29waG5WQWVwTEc3SnFhOWhFUnhYdDY5aDlZeXQ5Z0c1cz0iLCJtYWMiOiJiZWMzOTlmZmIzODYwOTllMDlhY2ZiY2YzZDE3YTY3NWMyNWRkMjg3YzI0ZWVmNjZhMDM0OWUyNmU5NThhZDAwIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:45:44', '2025-02-22 23:45:44'),
(754438003946029188, 'mohammadnsr06', '0', 'nasiri.mohammad06@yahoo.com', '41a55ca6faa4b636bb6104c0878df1fa', NULL, 1, 'en-US', 0, 'eyJpdiI6ImpYaEU1NCtPK0VXZi94bHpxT2ZQQ2c9PSIsInZhbHVlIjoiU3ozRUx1QjQ3cFcvM0Fydm1jMHRLT25ERlczb09CMjM1b1FqdHNjUnNwYz0iLCJtYWMiOiJmNjg1NTg4NmNlMDk4MGU1MmY4ZWRiZmNiOGM2ZTA2Njk2NWZmOTY2Zjk3Y2FjODM3ZGQzYzNmZjc0ZGI3ODFkIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:58:05', '2025-02-22 23:58:05'),
(760092263245283339, 'shishe_nazan', '0', 'perso.king9900@gmail.com', '58191c445a6af95caf1b6c4f9ef5b907', NULL, 1, 'en-US', 0, 'eyJpdiI6IlRtdVc1UU90QVlCTldQblkvVkg0cVE9PSIsInZhbHVlIjoiMEI4UkZvdHo3bUtJVWU3RHo2VkhFN1V5enNsSmYyRGU3dzVQaG5VODVsaz0iLCJtYWMiOiIwNTk5NzE1ZWZiNDRiY2YwYmJjMDBlY2Y5MTIyMTUzMGVmNWNlMjUxYmRkYWU3YzViMjUxZmI5ZjFmNjM1MmM3IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 04:01:36', '2025-02-23 04:01:36'),
(789480303239626793, 'sinator_ailen', '0', 'sina.moeni333@gmail.com', '143cfc20c9515743049df1b17b263506', NULL, 1, 'en-US', 0, 'eyJpdiI6IjYyYXhVTVZUR25TbE9NbmRCYU1qZ3c9PSIsInZhbHVlIjoiV0NQbzcrRGNLNEVsRTA0VVFTT0I4RGUxUWlZUnlMZVRabUZ3YjlvdFZ4az0iLCJtYWMiOiIwZTdlZWJmZjA2YWFjOGQzNDg3ODQ4Y2M0YjIwMzVjZTJhZmM1YzE4NTRjMDkwYTMyNzA0YWQ0Mjg0NzY3ZGZhIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 09:31:32', '2025-02-23 09:31:32'),
(802229672740913193, 'sirodox', '0', 'amirking8770@gmail.com', 'a_cc5e8b89a6358f76b613c00b365f4d9f', NULL, 1, 'en-US', 1, 'eyJpdiI6ImtYS2ZBS2FqdmpnM1FtRFBRYXFwSnc9PSIsInZhbHVlIjoibmhTUDBtT2xBUGFxQ3hmM081UG50SWZRZk1SYy9McnJwa1JRT01zV1Y3UT0iLCJtYWMiOiJhMWFlNmY4NTM3Zjk2ZDRiZWM5NWUyNDI4YWIyYTAzNmE2MzRlNzRlYjk3OWZlY2UxMjIwNzM4ZjdmMjIxMDIyIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 10:43:15', '2025-02-23 10:43:15'),
(812474079571214336, 'dark_aiden', '0', 'amirhosainasadi12@gmail.com', 'fe6210d9f4c63c9372c9caec673c1245', NULL, 1, 'en-US', 1, 'eyJpdiI6IlZaWmpYTEJNMzZsalY2SkhWd2owdHc9PSIsInZhbHVlIjoiSGxQVnJaTWNLZ2Y1UjBjWGxVMHNkWGc4Tk5tKzNnbU1OL1NSVy9PTE9ZMD0iLCJtYWMiOiI2MGZmMzIyOWNmMDMxNjNjOWQ3YjBhZTliYzlkYzExMjY5MTlhZGEyNzhkYjE2YzU1MjRkYmE1MGY4NTgxY2JhIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 11:20:05', '2025-02-23 11:20:05'),
(815535955779518505, 'pabolixp', '0', 'alirezanourpour2@gmail.com', '8a7dff528c6759ed0e5c5495d219b72c', NULL, 1, 'en-US', 1, 'eyJpdiI6ImZKalJ2ZFNVZnlUTXlzWjZLSHVmRHc9PSIsInZhbHVlIjoiN3pVZkxGR1VhY1F2RzduUDk3ZEhRdE1HeDcwdzJkcUN4eDBsOExXN0REST0iLCJtYWMiOiJiODcxNTAzMjY4YTk3ODM5NzYyMzhkYzUwZjUxYTNhYjJlNWFmZmQzMWZlNWU5NmIxM2NkNTJmMjdkMDVkYTcyIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 00:03:54', '2025-02-23 00:03:54'),
(816355056768253993, 'afshin132', '0', 'bafshin319@gmail.com', 'c5c1a1906ef259ade0bb4b0247007d58', NULL, 1, 'en-GB', 1, 'eyJpdiI6Inp4eEwvd1laT3huSUNEUGtmT3JxWkE9PSIsInZhbHVlIjoiRzF4RFhpWkcwWkJsbG4yUFFyeXVncDBHaFdMMldPWjhyZ3FBWmtuVEFMTT0iLCJtYWMiOiI4ZWY1NGM3OTIwMmQyMzRhN2MyODhjYjY5NDNkZTNhOTBiYjY1MjA0NjVlN2Q2NzU5ZjJiODQ4MTZiZTNkNmU3IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 02:31:38', '2025-02-23 08:53:04'),
(819831555266314281, 'dragonmt', '0', 'm.t.discord.382@gmail.com', '421d8f91aeff8790de2c978acff2eb4a', NULL, 1, 'en-US', 1, 'eyJpdiI6IktEWnRHZ3d3dmdNcWtya09sSFBXelE9PSIsInZhbHVlIjoiWjhDSWNMNmJobUVxdlBHWVp3RzNXSENhcW4rQm82Yk1zWkQwc3FYMmRDTT0iLCJtYWMiOiI2NDdmMzRlYWVlNDY0ZjA0NzcyZGZiYWYyZDAyYmVkMDY5MTQ5ZDUyNDExNWJkNTJmYTFmYzg4Y2QzNGQ5MDZhIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:51:21', '2025-02-22 23:51:21'),
(829394047407095848, 'pourya0505', '0', 'qolamipourya@gmail.com', '2686d35bf5bc03edce554bafa23a0d7a', NULL, 1, 'en-US', 0, 'eyJpdiI6IjJwOW5Xc2wwY0k4QjNpMm1NNUVrNEE9PSIsInZhbHVlIjoiZStoQXFpNldqSzZydVFYd01NQTVpdWRmSkt2TFo3bGR6YXF3VEZRRmhsYz0iLCJtYWMiOiI4OTU4ZTdiNTdlYjk3ZThmY2M5YWI4OWFlZDczYmRmOWM2Yjg3MTkzZTkzMzBlZDRlMDBhNTRlMDhmYTZmOTQyIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:49:41', '2025-02-22 23:49:41'),
(843829837780222003, 'the_rejected_god', '0', 'therejectedgod666@gmail.com', '3ec870ce720a7b1467d2ce190089e51a', NULL, 1, 'en-US', 1, 'eyJpdiI6ImtncDNZcTJKVHdSZWpMdHNUTzVjN0E9PSIsInZhbHVlIjoicXdCNGZyMmw3NlFEZzZMRW55UkhBckxWMUZMdU1tUk1RWTNkSTZjMS9qMD0iLCJtYWMiOiJmYWEyNjU5NzI3MjA4OTQ3MDVlN2ViMmZjYWI1ZTg0ZGE5MDMzM2Y5YTg3YmI5NWUwYmU4YmQwZmM4NmRiNDRmIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 07:31:51', '2025-02-23 07:31:51'),
(906117941869809675, 'mohammadreza.a.j', '0', '1375522poor@gmail.com', '54db9c560579e8a6cf6685e8ae715a2b', NULL, 1, 'en-US', 1, 'eyJpdiI6IkpKQkt2LzZLYStxcEs1aFY0MHZweGc9PSIsInZhbHVlIjoiY2NzVHQxdUxRUkZmWWFsVzZIWTY5NVVGRzhFL0hFU2ZGdGpuL2RyQ2JPcz0iLCJtYWMiOiI2YTgyZmQ0YzY5ZDdkMDZkZDgwMjMxNWU4YjllMGU4MzZiZGE1YmRhOWQ2ZjIyYmVmZTg5M2FiZjA1OTkwYzMyIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:11:15', '2025-02-22 23:25:53'),
(912313667649933334, 'masterarad', '0', 'arad.master87@gmail.com', 'a200a3ed6bb04dd3ff0b4d8ff279dcbb', NULL, 1, 'en-US', 0, 'eyJpdiI6IjVMa0VXMHg2QkJ0ZUFpN3R3cEJPUnc9PSIsInZhbHVlIjoiajM3RnVvQ2RaaCtFZm16N0VqamgxQmNNVW1Ca3V4anZWVFdYS2hheWN2Yz0iLCJtYWMiOiIyYWNkNDgyNzZkZmNhNzE0NTlkNDRiNGVhNWU1ZTIxYWY1ZWNjZTVmMDZhMjllZmY5MWE4NzFlMWFjOTdiNDM5IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 05:49:23', '2025-02-23 05:49:23'),
(917107516301779036, 'jasuntatum', '0', 'imsaviorsoldier@gmail.com', '37e87beb7477ae8ba8a0f86b3536ad29', NULL, 1, 'en-US', 0, 'eyJpdiI6IlVyUjZ2d3FpVHZDbnBLdXc5ektrbWc9PSIsInZhbHVlIjoiQ1M5bFo5dmZnbE5SY3BWTWs0SGFtMWRMNm5UOTF2ZGJOZGVQTGxpeTdOcz0iLCJtYWMiOiI3ZDZiZjUzNDE4NGNiYzU5MjJmNTRiYzQ0YTQ3MjgzMDRhNzE4YTA2NjAyYTFmM2E0MzI1M2IwNzhjNDMyMDQ4IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 00:31:40', '2025-02-23 00:31:40'),
(941605247183388742, 'aqayezakarya', '0', 'gnhmohammad@gmail.com', 'e579a0f0c01613541b23dbd4dfe2609e', NULL, 1, 'en-US', 0, 'eyJpdiI6ImJ2dGdXdDRJR0t1RFI4aEVHaGVKWlE9PSIsInZhbHVlIjoiUjZMeU9RM0VVeWdERmRBcEdza1R0Q29JdGJ4TU90N25LVGxzZ2VwcVYwOD0iLCJtYWMiOiJkY2M1NjlkYmI1ZDNmOTBiNjhjZjY3ZjY2NWI2ZjU0ZDY4MWE5ZDYzYmM2ZmMwYmFlYTkyZTk3NjcyN2YwODcwIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 07:37:07', '2025-02-23 08:08:03'),
(956088436622770226, 'arshan_tibon', '0', 'arshan.13861386@gmail.com', '6ba5ae2271a835f6a4dbd21935441beb', NULL, 1, 'en-US', 0, 'eyJpdiI6IlZkWkNLakd1dmRRRHE5U1lHNGpOaWc9PSIsInZhbHVlIjoiMTAwVGw0cllWMjhRV2tKbFZlaE9ISFptcXQxTXF5WXU0dVM5OHAzYStOTT0iLCJtYWMiOiJiZmNhYjFmY2FmZjRmYzU2OTQwNTFjYjg0ZWZjMTk0ODRkYWIxMDJiNmUyYWUwNjJhYzFhZGQ1MTkwNTE3ZGViIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 07:30:40', '2025-02-23 09:31:22'),
(966249625206005770, 'ganaone', '0', 'ahmadreza10099@gmail.com', '794727a8f07fb780372abe6dd2a7f7a1', NULL, 1, 'en-US', 0, 'eyJpdiI6IjhYZzF2eFM2dktiUTlZWWVUSDdYSUE9PSIsInZhbHVlIjoiWVNFdjZ4cDRWMndVNFV6VUUvRnlOUndxTDJJeFFqLzZTRFpqaWQwQVlLbz0iLCJtYWMiOiI2ODI0NzRiYTYzZDhkMmFhMDNlZTMyYmY4NDBhOGU4ZDhlODI0NTc4OTI5NDk0YWJjNzExMDNhMGZlNmM4MDRjIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 11:08:53', '2025-02-23 11:08:53'),
(984850998776459376, 'samurai8666', '0', 'samuraikochak@gmail.com', 'a0ec3d0e435ebe2eddb7389419e65c75', NULL, 1, 'en-US', 1, 'eyJpdiI6Ik9qTW10akRTRTRHbTJHdmxJNmg1TFE9PSIsInZhbHVlIjoiaGltZThsMEJ6ZlIrYyttbVZoUkFaZVZqc0JFdGp6RVNKNHdRVEdGZFRNOD0iLCJtYWMiOiI3NmFiYzY1NWFlY2M2ZDc3NTIzYWJjOGZkZWIyZDZmM2U5YTVjYTIxMWQ2NGFkNzRmYzExZmFkOTY5YmM5MzczIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 09:53:27', '2025-02-23 09:53:27'),
(995654074194198588, 'w4u1', '0', 'cod.sadra13@gmail.com', '7d590ec8e4362a3b120efdab4fbfaae8', NULL, 1, 'en-US', 1, 'eyJpdiI6InRnZzF0aHhVQVY5K1JYMFcyQWhJQUE9PSIsInZhbHVlIjoiSXBYck4yYmRnUGN4dGZiek0wMklWQkxIUDVUNCs1WWJZS1ZKVjFvZlBkMD0iLCJtYWMiOiI5YWZkYmU4NjYwNDY0MzcwYTkwMDczNjc4N2ZjODcyODNkNzg0OTNhMjI1YzRhY2E1NGY0OTIzN2YzNTBmYmY5IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 07:15:57', '2025-02-23 07:15:57'),
(1004788269139103856, 'pouya.ghaedi', '0', 'onlinister@gmail.com', '273cbe56f5a4fbcfa6ae6cb3fcf1f29a', NULL, 1, 'en-US', 0, 'eyJpdiI6IjkyRzVZNTEzMTk3WDdqUkIyZEhLRnc9PSIsInZhbHVlIjoiQ2NKZ0FlNHhjcU1DcHp2RlhSRUpqeXBXRmNpWEtuaWNBaTY1NjJ4OVV0WT0iLCJtYWMiOiIwZDQ2YWFjZTA1YWNkODllYTc3ZmQxZDI2YzU3YTEwZGY0ZDIyN2Y4M2I4Y2I3ZWJiNjU0YzJhNThiYzU5ODE1IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 11:27:06', '2025-02-23 11:27:06'),
(1014884769173090304, 'behix.', '0', 'banikamalibehbod@gmail.com', '3f5d2719beb27ab344cb29a369a6cece', NULL, 1, 'en-US', 0, 'eyJpdiI6IlV5Njg1dC8wZEZmVUIxaWc1M0hBR1E9PSIsInZhbHVlIjoiMU5YSEVPVGtWdWl1TXRSU0VVb0pUdm1YNlk4cXRPd0drK2pqUXVocXNtMD0iLCJtYWMiOiIwNTZiMmIzYzg0ODU1NDUyODk3NGJmODIyNTAwOGY2ZTdmOTcxMWU4YmQ5MTc5ODViYjFlMzhhMzRjM2FmMDRhIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 09:49:14', '2025-02-23 09:57:01'),
(1091798269409116230, 'mr.x1945', '0', 'mrdarknas938@gmail.com', 'c9a89a0165381ef92522f0276f1c3913', NULL, 1, 'en-US', 0, 'eyJpdiI6ImRxRWxlcVZlY25uNzdmM3N1aFZLQVE9PSIsInZhbHVlIjoiMmJLbWczUTBUYUoyQnd3TFRXOXJQZlFMVkZsZm5SZFE1K3N3ZnFUUnFGYz0iLCJtYWMiOiJjNWU4ODkwZmE1ZDM4Y2FhMTE1ZTc2OGU4OTQwNTMxMzQ4ZjY1ZTQ3NDkxNGFkY2IzMGRiNzU3NzgxMjEzNGI1IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:39:11', '2025-02-22 23:39:11'),
(1126923238694453269, 'danial9936', '0', 'danialir568@gmail.com', '5883edf6ef0199b524479d33c254a8c0', NULL, 1, 'en-US', 1, 'eyJpdiI6Ikt5NURvRVExSVYvOUVEcUVDWFRTZXc9PSIsInZhbHVlIjoiTldJaHNickhDbEFlNXg3UW1YM3lSaG4wdTZGK0V6ZGVrdGMxekplQ0xpdz0iLCJtYWMiOiI5MmM4MzQ3ZThhNDk3NzY4NTU1ODA3YjZjNWRmZTgzYjU0OGI1ODY1ZTFlNTRmMmQ2YTE5NTlmODgxNmYzMzU0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:36:33', '2025-02-22 23:36:33'),
(1270073077258129480, 'lilkittycat__', '0', 'littlechihiroishere@gmail.com', '2b646a5403d00269ea47b768723f2a0e', NULL, 1, 'en-US', 0, 'eyJpdiI6IlI4ZllnVVFwdWUvT21zRDRmRXRnZVE9PSIsInZhbHVlIjoiQ2lsbC9DcmNRU0lzMDVOdWVLdkZ3SDZtTVhhSDA0QUMxbnk2OEd2c1B4OD0iLCJtYWMiOiJkZTRlY2RhZWU0MGRiNTg5N2ZiY2QzMGU0NjI2ZThmYzk0ZjBhMWE3ZDc0ODJmNjFmYzBlYzNiOWY2YWFlMjcxIiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 07:07:35', '2025-02-23 07:07:35'),
(1290794448380235836, 'adsyn1992_11493', '0', 'khalilseyedain@gmail.com', NULL, NULL, 1, 'en-US', 0, 'eyJpdiI6Im1sejlBeUpmRFh6ZDZGenJJUm96UHc9PSIsInZhbHVlIjoiSXZsQ3YyV1NqM21VYzl0OEF4RHMwMlVudVVmZUxBMldVaHBFUzh2TjdxUT0iLCJtYWMiOiJjNjA0ZDJhNDQ4YWUyYTFkYTQwZDU2NmM0ODk1MjliZTU1ZDVmYzdlYThhNTRiNmQxMjQxYWUzMjQxYTk0MTQ0IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-22 23:48:45', '2025-02-22 23:48:45'),
(1311717713680273440, 'arashi_26_19', '0', 'arash.azi26.1998@gmail.com', '04682bc293025be86c54ea93ec3304ff', NULL, 1, 'en-US', 0, 'eyJpdiI6IlhsQWVSR1Z0bE1YNExISVZnVlVBNFE9PSIsInZhbHVlIjoiOXBsS3IxVUtpZXNhbjdSMmdJQU9uK1ZHSlhqZ2htSkNaTm1Ldkl0TEFqVT0iLCJtYWMiOiJiMzU0YzVhZGNiNDliNTllYWFiMjVkZGZlMGZlYzBkNDhlYTI4YjE0ZWZmNTVlMjRiMWYzOTFjYmQ1MWI2MWM1IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 05:39:54', '2025-02-23 05:43:59'),
(1315325272438083596, 'artin_bro', '0', 'artinkhalilian1@gmail.com', '49a5c14b32f7bf328c4de7d7f75fd617', NULL, 1, 'en-US', 0, 'eyJpdiI6ImpOamJyWXEwQ1FraFpBT3pXSnArN3c9PSIsInZhbHVlIjoiVTlNTDZVRmtkMkZob0RjalpVcTZieG5yekhJWmxCa003d3MvKzR2djRNYz0iLCJtYWMiOiIwNWFjODQ0ZmJjOTUyNTdmMTJhZDQzZDEyMzUyNzgzMWFlNGU1M2UxM2Y3NzZiOTg1MDhlNjZkZWU3NTM2OTE1IiwidGFnIjoiIn0=', NULL, NULL, '2025-02-23 11:34:58', '2025-02-23 11:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `back_histories`
--
ALTER TABLE `back_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `back_histories_user_id_foreign` (`user_id`),
  ADD KEY `back_histories_accepted_by_foreign` (`accepted_by`);

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cruds_name_unique` (`name`),
  ADD UNIQUE KEY `cruds_model_unique` (`model`),
  ADD UNIQUE KEY `cruds_route_unique` (`route`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel_admins`
--
ALTER TABLE `panel_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panel_admins_user_id_unique` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `tires`
--
ALTER TABLE `tires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_tire_id_foreign` (`tire_id`),
  ADD KEY `transactions_last_tire_id_foreign` (`last_tire_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_tire_id_foreign` (`tire_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `back_histories`
--
ALTER TABLE `back_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `panel_admins`
--
ALTER TABLE `panel_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tires`
--
ALTER TABLE `tires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1315325272438083597;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `back_histories`
--
ALTER TABLE `back_histories`
  ADD CONSTRAINT `back_histories_accepted_by_foreign` FOREIGN KEY (`accepted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `back_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panel_admins`
--
ALTER TABLE `panel_admins`
  ADD CONSTRAINT `panel_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_last_tire_id_foreign` FOREIGN KEY (`last_tire_id`) REFERENCES `tires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_tire_id_foreign` FOREIGN KEY (`tire_id`) REFERENCES `tires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_tire_id_foreign` FOREIGN KEY (`tire_id`) REFERENCES `tires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
