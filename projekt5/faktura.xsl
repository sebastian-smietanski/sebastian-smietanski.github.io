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
                        <td class="col1"><xsl:value-of select="position()"/></td>
                        <td class="col2"><xsl:value-of select="nazwa"/></td>
                        <td class="col3"><xsl:value-of select="podstawa_zwolnienia"/></td>
                        <td class="col4"><xsl:value-of select="miara"/></td>
                        <td class="col5"><xsl:value-of select="ilosc"/></td>

                        <td class="col6"><xsl:value-of select="floor(cena_jednostkowa div 1)"/></td>
                        <td class="col7"><xsl:value-of select="cena_jednostkowa mod 1 * 100"/></td>

                        <td class="col8"><xsl:value-of select="floor(ilosc * cena_jednostkowa div 1)"/></td>
                        <td class="col9"><xsl:value-of select="ilosc * cena_jednostkowa mod 1 * 100"/></td>

                        <td class="col10"><xsl:value-of select="stawka_podatkowa"/></td>

                        <td class="col11"><xsl:value-of select="floor((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100))"/></td>
                        <td class="col12"><xsl:value-of select="round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) mod 1 * 100)"/></td>

                        <td class="col13"><xsl:value-of select="floor((ilosc * cena_jednostkowa * 100 - round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) * 100)) div 100)"/></td>
                        <td class="col14"><xsl:value-of select="(ilosc * cena_jednostkowa * 100 - round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) * 100)) mod 100"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </div>
    </body>
</html>
</xsl:template>
</xsl:stylesheet>