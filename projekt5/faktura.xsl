<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <title>BSI Projekt 5: Faktura</title>
        <link rel="icon" type="image/x-icon" href="../icons/favicon.ico" />
        <link rel="stylesheet" href="faktura.css" />
    </head>
    <body>
        <div class="bloczek">
            <img src="faktura1.jpg" alt="faktura" height="850px" />
            <div id="sprzedawcaNazwa"><xsl:value-of select="faktura/sprzedawca/nazwa" /></div>
            <div id="sprzedawcaAdres"><xsl:value-of select="faktura/sprzedawca/adres" /></div>
            <div id="sprzedawcaNIP"><xsl:value-of select="faktura/sprzedawca/nip" /></div>

            <div id="nabywcaNazwa"><xsl:value-of select="faktura/nabywca/nazwa" /></div>
            <div id="nabywcaAdres"><xsl:value-of select="faktura/nabywca/adres" /></div>
            <div id="nabywcaNIP"><xsl:value-of select="faktura/nabywca/nip" /></div>

            <table>
                <xsl:for-each select="faktura/lista_towarow/towar">
                    <tr>
                        <td><xsl:value-of select="nazwa"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </div>
    </body>
</html>
</xsl:template>
</xsl:stylesheet>