<head><?php   $pagename=$this->router->class;   if($page){ $pagename=$page;};$generalsetting = $this->db->select('*')->from('general_setting')->where(array('id'=>1))->get()->result();$page = $this->db->select('*')->from('gp_settings')->where(array('page_name'=>$pagename))->get()->result();//print_r($page[0]);?><title><?php echo @$page[0]->page_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"-->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php echo trim(@$page[0]->meta_title); ?>"/>
	<meta name="keywords" content="<?php echo trim(@$page[0]->meta_keywords); ?>" />
	<meta name="google-site-verification" content="" />
	<meta name="p:domain_verify" content=""/> 
	<meta name='yandex-verification' content='' />
	<meta name="msvalidate.01" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="<?php  echo base_url();?>/application/frontend/layout/advanced/assets/img/icon.png" type="image/x-icon">
	<link rel="icon" href="<?php  echo base_url();?>favicon.png" type="image/x-icon" /><link rel="apple-touch-icon" href="<?php  echo base_url();?>apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" href="<?php  echo base_url();?>apple-touch-icon.png"/> 
	<meta name="author" content="Gosearch"/><meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<meta name="revisit-after" content="1 days">
	<META NAME="Language" CONTENT="en">
	<meta name="reply-to" content="<?php echo @$generalsetting[0]->site_email ?>">
	<meta name="rating" content="General"/>
	<meta name="Publisher" content="<?php echo @$generalsetting[0]->site_name ?>">
	<META NAME="Category" CONTENT="Business Service">
	<meta name="copyright" content="Copyright gosearch - All rights Reserved 2015">
	<meta name="classification" content="GoSearchTravel - Dream, Explore, Compare - GO!, compare cheap flights from hundreds of airlines and thousands of hotels">
	<meta name="distribution" content="Global">
	<meta name="coverage" content="Worldwide">
	<meta name='webgains-site-verification' content='uku8un7a' />
	<link rel="alternate" type="text/directory" title="vCard" href="<?php  echo base_url();?>vCard.vcf" />
	<link type="text/plain" rel="author" href="<?php  echo base_url();?>humans.txt" />
	<link rel="dns-prefetch" href="<?php  echo base_url();?>">
	<link rel="canonical" href="<?php  echo base_url();?>"/>
	<meta name="subject" content="GoSearchTravel - Dream, Explore, Compare - GO!, compare cheap flights from hundreds of airlines and thousands of hotels">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $page[0]->meta_title; ?>" />
	<meta property="og:description" content="<?php echo trim($page[0]->meta_description); ?>" />
	<meta property="og:url" content="<?php  echo base_url();?>" /><meta property="article:publisher" content="https://www.facebook.com/" /><meta property="og:image" content="/../assets/files/<?php echo @$generalsetting[0]->logo; ?>" /><meta name="twitter:card" content="summary_large_image"/><meta name="twitter:description" content="<?php echo trim($page[0]->meta_description); ?>"/><meta name="twitter:title" content="<?php echo $page[0]->meta_title; ?>"/><meta name="twitter:site" content="@gosearch"/><meta name="twitter:image:src" content="/../assets/files/<?php echo @$generalsetting[0]->logo; ?>"/><meta name="twitter:creator" content="@gosearch"/><meta itemprop="name" content="<?php echo preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;',$page[0]->meta_title); ?>"/><meta itemprop="description" content="<?php echo trim($page[0]->meta_description); ?>"/><meta itemprop="image" content="/../assets/files/<?php echo @$generalsetting[0]->logo; ?>"><?php ?><!--End seo meta-->
	<link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT ?>/assets/css/base.css">
</head>