<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
	<body>
		<table>
			<tr>
				<th>Galdera</th>
				<th>Zailtasuna</th>
				<th>Gaia</th>
			</tr>
			<xsl:for-each select= "/assessmentItems/assessmentItem">
			<tr>
				<td><font size="2" color="red" face="Verdana">
					<xsl:value-of select="itemBody/p"/> <br/></font></td> 
				<td><font size="2" color="red" face="Verdana">
					<xsl:value-of select="@complexity"/> <br/></font></td> 
				<td><font size="2" color="red" face="Verdana">
					<xsl:value-of select="@subject"/> <br/></font></td> 
			 </tr>
			 </xsl:for-each>
		</table>
	</body>
</html>
</xsl:template>
</xsl:stylesheet>