-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2025-01-11 16:51:44
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `blog_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Yunzhe', 'Li', 'admin', '$2y$10$QpEVqlM1qr5wv95T/IU8Z.jiN.0QdqkDEAvTcVIgNjmqQLTWps/6e');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, '人工智能'),
(3, 'WEB开发'),
(4, 'Java'),
(5, 'Python');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `post_id`, `created_at`) VALUES
(10, '你好', 3, 10, '2025-01-03 10:39:59'),
(11, '此处上课演示用', 3, 13, '2025-01-10 16:10:22');

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(127) NOT NULL,
  `post_text` text NOT NULL,
  `category` int(11) DEFAULT '0',
  `publish` int(2) NOT NULL DEFAULT '1',
  `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `category`, `publish`, `cover_url`, `created_at`) VALUES
(10, '简单介绍WEB开发', '<div>1.1 什么是 Web 开发</div><div>&nbsp; &nbsp; &nbsp; &nbsp;Web 开发，简单来说，就是构建能够通过浏览器访问的网站的过程。Web 代表着全球广域网，也就是我们熟知的万维网（www），它连接着世界各地的计算机和服务器，使得人们可以轻松访问各种网站，获取丰富多样的信息。Web 开发涉及多个技术领域，包括前端开发、后端开发、数据库管理等，这些技术相互协作，共同打造出功能强大、用户体验良好的网站。无论是电子商务网站、社交媒体平台，还是企业官网、在线教育平台等，都离不开 Web 开发技术的支持。</div><div><br></div><div>1.2 网站的工作流程</div><div><ul><li>前端资源请求：当用户在浏览器地址栏输入网站地址并按下回车键后，浏览器会向前端服务器发送请求，获取前端程序（通常是 HTML、CSS 和 JavaScript 文件）。前端服务器接收到请求后，将相应的前端代码返回给浏览器。</li><li>页面解析与展示：浏览器收到前端代码后，会对其进行解析，将 HTML 标签转换为可视化的页面元素，如标题、段落、图片、链接等，并根据 CSS 样式规则渲染页面样式，使其呈现出丰富的布局和视觉效果。此时，用户就能够在浏览器窗口中看到网站的页面，但页面中的数据可能尚未填充。</li><li>数据请求与获取：浏览器在解析前端代码时，会发现页面中需要从后台服务器获取数据的部分，于是根据前端代码中指定的后台服务器地址，向后台服务器发起请求。后台服务器接收到请求后，根据请求的内容从数据库中查询或处理相关数据，并将数据返回给浏览器。</li><li>数据展示与交互：浏览器拿到后台返回的数据后，将其填充到相应的页面位置，使页面内容完整显示。用户可以与页面进行交互，如点击链接、提交表单、滚动页面等，浏览器会根据用户的操作再次与服务器进行数据交互，更新页面内容或执行相应的业务逻辑，从而实现动态的网站体验。</li></ul></div><div>1.3 网站的开发模式</div><div>&nbsp; &nbsp; &nbsp; &nbsp; 前后台分离模式：这是目前企业开发中广泛采用的主流模式，市场占有率超过 70%。在这种模式下，前端开发人员专注于开发前端程序，利用 HTML、CSS、JavaScript 等技术构建用户界面和交互逻辑，然后将前端程序单独部署到前端服务器上。后端开发人员则使用 Java、Python、Node.js 等编程语言开发后端程序，负责处理业务逻辑、数据存储和接口提供，后端程序部署在后端服务器上。前后端通过接口进行数据交互，实现了分工明确、职责清晰的开发流程，提高了开发效率和系统的可维护性。</div><div>混合开发模式：这是早期的开发技术，如今逐渐被前后台分离模式所取代，但在一些特定场景下仍有应用。混合开发模式中，前端人员和后端人员的代码写在同一个项目中，开发完成后一起打包部署到服务器上。这种模式的优点是开发过程相对简单，对于小型项目或对交互性要求不高的网站可能较为适用。然而，随着项目规模的扩大和业务逻辑的复杂，混合开发模式的维护成本会逐渐增加，因为前后端代码的耦合度较高，修改和扩展功能可能会影响到整个项目。</div><div>1.4 网站的开发技术</div><div><ul><li>前端 Web 技术</li></ul></div><div>&nbsp; &nbsp; &nbsp; &nbsp;基础技术：HTML（超文本标记语言）用于构建网页的基本结构，定义页面的元素和内容，如标题、段落、图片、链接等；CSS（层叠样式表）负责控制页面的样式，包括字体、颜色、布局、背景等，使页面呈现出美观的视觉效果；JavaScript 是一种脚本语言，用于实现页面的动态交互，如响应用户操作、更新页面数据、发送异步请求等。此外，Vue.js 等前端框架也在现代 Web 开发中广泛应用，它能够提高开发效率，简化复杂的交互逻辑实现。</div><div>&nbsp; &nbsp; &nbsp; &nbsp;工程化与部署：Vue 工程化涉及到使用 Webpack 等构建工具对项目进行打包、优化，以及引入 TypeScript 增强代码的类型检查和可维护性。Element 等 UI 组件库提供了丰富的预设计组件，方便快速搭建美观且功能一致的用户界面。在项目开发完成后，需要使用 Nginx 等服务器软件进行部署，将前端项目发布到服务器上，使其能够被用户访问。</div><div><ul><li>后端 Web 技术</li></ul></div><div>&nbsp; &nbsp; &nbsp; &nbsp;Java 相关技术：Maven 是常用的项目构建工具，用于管理项目依赖、构建项目结构等；Servlet 和 Tomcat 是 Java Web 开发的基础，Servlet 处理 HTTP 请求并生成响应，Tomcat 则是一个 Servlet 容器，负责运行 Servlet 程序；HTTP 协议是 Web 通信的基础，开发人员需要深入理解其原理和规范。此外，Spring Boot 作为一个流行的后端框架，提供了起步依赖、自动配置等功能，大大简化了后端开发流程，提高了开发效率。在数据库操作方面，常用的有 MySQL 数据库，开发人员通过编写 SQL 语句或使用 MyBatis 等持久层框架进行数据的增删改查操作。同时，还涉及到请求处理、响应生成、AOP（面向切面编程）用于实现日志记录、权限控制等横切关注点，Filter 用于过滤请求和响应，JWT（JSON Web Tokens）用于实现用户认证和授权等安全相关技术。</div>', 3, 1, 'COVER-67774903387542.30564849.png', '2025-01-03 10:18:43'),
(11, '人工智能应用前景', '<div>&nbsp; &nbsp; &nbsp; &nbsp;人工智能研究的内容大致有：机器学习与知识获取、知识表示、自然语言理解、自动推理与搜索方法、智能机器人、知识处理系统、计算机视觉、自动编程等方面。人工智能未来的发展前景非常广阔。人工智能的应用主要包括：零售、医疗、交通、教育、家居、物流、安防等七大领域。</div><div>1、 零售</div><div>&nbsp; &nbsp; &nbsp; 人工智能在零售业的应用非常广泛：客流统计、智能供应链、无人便利店、无人仓库/无人车等都是热点方向。京东自主开发的无人仓库采用大量智能物流机器人进行协调配合，通过人工智能、深度学习、图像智能识别、大数据应用等技术，让工业机器人能够进行自主判断和行为，完成各种复杂任务，在商品分拣、运输、仓库等环节实现自动化。图谱技术将人工智能技术应用于客流统计。通过基于人脸识别的客流统计功能，商店可以从性别、年龄、表情、新老顾客、停留时间等维度建立客流的用户人像，为调整经营策略提供数据基础，帮助商店从匹配实际的角度进行经营，提高转化率。</div><div>2、医疗</div><div>&nbsp; &nbsp; &nbsp; 目前，在垂直图像算法和自然语言处理技术领域，可以基本满足医疗行业的需求，市场上有许多技术提供商，如德商云兴、人工智能细胞识别医疗诊断系统的研发，提供智能辅助诊断服务平台，如水医疗、统计和医疗数据处理等。虽然智能医疗在辅助诊断与治疗、疾病预测、医学影像辅助诊断、药物开发等方面发挥着重要作用，但由于医院间医学影像数据与电子病历的不循环，企业与医院之间的合作不透明，使得技术发展与数据供应存在矛盾。</div><div>3、交通</div><div>&nbsp; &nbsp; &nbsp; 智能发展交通网络系统是通信、信息和控制企业技术在交通安全系统中集成应用的产物。ITS 应用最广泛的地区是日本，其次是美国、欧洲等地区。目前，我国在ITS方面的应用主要是可以通过对交通中的车辆流量、行车速度问题进行数据采集和分析，可以对交通方式进行研究实施过程监控和调度，有效方法提高通行能力、简化交通资源管理、降低社会环境造成污染等。</div><div>4、教育</div><div>&nbsp; &nbsp; &nbsp; &nbsp;iFlytek和普通教育等公司已经开始探索人工智能在教育领域的应用。 通过图像识别，可以通过机器对试卷进行校正和答题，通过语音识别提高发音，人机交互可以在线答题。 人工智能与教育的结合可以在一定程度上改善教育部门教师分布的不平衡和高成本，从工具层面为教师和学生提供更有效的学习方法。 然而，它不能对教育内容产生更实质性的影响。</div><div>5、家居</div><div>&nbsp; &nbsp; &nbsp; &nbsp;智能家居基于物联网（IoT）技术，由智能硬件、软件和云计算平台构成完整的家居生态系统。 用户可以远程控制设备，设备可以互联，自主学习，优化家庭环境的安全性、节能性、便利性等。 值得一提的是，近两年来，随着智能语音技术的发展，智能扬声器已经成为一个亮点。 天猫、小米等公司推出了自己的智能音箱，不仅成功打开了家居市场，也培养了用户未来购买更多智能家居产品的习惯。 然而，目前国内市场上智能产品的种类很多，如何突破这些产品之间的通信障碍，为智能家居建立一个安全可靠的服务环境是业界下一个关注的焦点。</div><div>6、物流</div><div>&nbsp; &nbsp; &nbsp; &nbsp;物流业通过运用智能搜索、推理规划、计算机视觉和智能机器人技术，在运输、仓储、配送、装卸过程中实现了自动化，基本上可以实现无人操作。例如，利用大数据对货物的智能配送进行规划，优化物流供应配置，需求匹配，物流资源配置。目前，物流行业的大部分人力资源都分布在“最后一英里”的配送环节，京东、苏宁、新秀赛车等开发无人驾驶飞行器、无人驾驶飞行器，以努力抓住市场机遇。</div><div>7、安防</div><div>&nbsp; &nbsp; &nbsp; &nbsp;近年来，我国安全监控行业发展迅速，视频监控的数量不断增加，在公共场景和个人场景中安装的监控摄像头总数已超过1.75亿台。此外，在一些一线城市，视频监控已实现全面覆盖。然而，与国外相比，中国的安全监测领域仍有很大的增长空间。安防监控行业的发展中国经历了四个经济发展研究阶段，分别为模拟监控、数字监控、网络高清、和智能监控数据时代。每一次行业变革，都得益于算法、芯片和零组件的技术企业创新，以及由此带动的成本不断下降。因而，产业链上游的技术产品创新与成本会计控制自己成为安防监控系统主要功能结构升级、产业市场规模增长的关键，也成为一个产业可持续健康发展的重要理论基础。</div>', 2, 1, 'COVER-677749a045b616.63278672.png', '2025-01-03 10:21:20'),
(12, 'Java语言历史', '<div><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">1.1 初始阶段（1991-1995）</span></div><div>Java的历史可以追溯到1991年，当时James Gosling和他的团队在Sun Microsystems开始开发一个名为“Green Project”的项目。该项目的目标是为家用电器和消费电子产品开发一种可编程的语言。</div><div><br></div><div>1995年：Java 1.0正式发布，标志着Java语言的诞生。Java的主要特点是“编写一次，处处运行”（WORA），这得益于Java虚拟机（JVM）的引入。</div><div><br></div><div>1.2 发展阶段（1996-2000）</div><div>Java 2（1998）：引入了Swing GUI工具包、Java 2平台（包括标准版、企业版和微型版），并增强了Java的多线程支持和性能。</div><div><br></div><div>Java 2平台（J2EE）：为企业级应用提供了强大的API和运行环境，使得Java在企业开发中变得越来越重要。</div><div><br></div><div>1.3 成熟阶段（2001-2010）</div><div>Java 5（2004）：引入了泛型、枚举类型、注解等特性，使得Java语言更加灵活和强大。</div><div><br></div><div>Java 6（2006）：增强了对Web服务的支持，改进了JVM性能。</div><div><br></div><div>Java 7（2011）：引入了“动态语言支持”和“try-with-resources”语句，进一步简化了代码。</div><div><br></div><div>1.4 现代阶段（2011至今）</div><div>Java 8（2014）：引入了Lambda表达式和Stream API，使得Java在处理集合时更加高效和简洁。</div><div><br></div><div>Java 9（2017）：引入了模块系统（JPMS），提高了Java的可维护性和可扩展性。</div><div><br></div><div>Java 11（2018）：成为长期支持（LTS）版本，进一步增强了性能和功能。</div><div><br></div><div>Java 17（2021）：又一个LTS版本，包含了新的语言特性和API改进。</div>', 4, 1, 'COVER-67774a2f8e1626.84135854.png', '2025-01-03 10:23:43'),
(13, 'Python教程', '<div><a href=\"https://www.runoob.com/python3/python3-tutorial.html\" target=\"_self\">https://www.runoob.com/python3/python3-tutorial.html</a></div>', 5, 1, 'COVER-67774e675a4933.43245410.png', '2025-01-03 10:41:43');

-- --------------------------------------------------------

--
-- 表的结构 `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(11) NOT NULL,
  `liked_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `post_like`
--

INSERT INTO `post_like` (`like_id`, `liked_by`, `post_id`, `liked_at`) VALUES
(13, 3, 10, '2025-01-03 10:39:52'),
(14, 3, 13, '2025-01-10 16:10:06'),
(15, 3, 12, '2025-01-10 16:11:00');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`) VALUES
(3, 'lyz', 'sasasa', '$2y$10$qs9es32Q0jvyJzKlIzlqr./rTR37RSo4J8VP2yqBp740HcBeAB5Rq'),
(4, '奶龙', '奶龙', '$2y$10$gbOI0IipAfmTFNGVUPNT8.diJp/D1mnzbGUt5qdiTwGFqhcqqwaVi');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 表的索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- 表的索引 `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
