{include file='documentHeader'}

<head>
	<title>INDEX - {PAGE_TITLE|language}</title>
	
	{include file='headInclude' sandbox=false}
</head>

<body id="tpl{$templateName|ucfirst}">
{include file='header' sandbox=false}

<header class="mainHeading">
	<img src="{icon size='L'}home1{/icon}" alt="" />
	<hgroup>
		<h1>{PAGE_TITLE|language}</h1>
		{hascontent}<h2>{content}{PAGE_DESCRIPTION|language}{/content}</h2>{/hascontent}
	</hgroup>
</header>


{include file='footer' sandbox=false}

</body>
</html>