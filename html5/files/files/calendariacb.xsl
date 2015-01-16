<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
	<head></head>
	<body>
<table border="1" width="400" align="center">
	<caption> Jornada 8a </caption>
	<tbody>
		<th class="normal">Pts</th>
		<th class="normal">Equip Local</th>
		<th class="normal">Equip Visitant</th>
		<th class="normal">Pts</th>
	</tbody>

    <xsl:for-each select="tallerxml/calendariacb[jornada='8']" >   <!-- Filtrem la jornada -->
	<tr>
		<td><xsl:value-of select="punts_local" /></td>
		<td> <xsl:value-of select="equip_local" /></td>
		<td> <xsl:value-of select="equip_visitant" /></td>
		<td><xsl:value-of select="punts_visitant" /></td>
	</tr>
   </xsl:for-each>
</table>  
</body>
</html>

</xsl:template>
</xsl:stylesheet>     