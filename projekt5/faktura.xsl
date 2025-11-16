<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output omit-xml-declaration="yes" indent="yes"/>
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
            <img src="faktura1.jpg" alt="faktura" height="850px" draggable="false" />
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
                        <td class="col7"><xsl:value-of select="round(cena_jednostkowa mod 1 * 100)"/></td>

                        <td class="col8"><xsl:value-of select="floor(ilosc * cena_jednostkowa div 1)"/></td>
                        <td class="col9"><xsl:value-of select="round(ilosc * cena_jednostkowa mod 1 * 100)"/></td>

                        <td class="col10"><xsl:value-of select="stawka_podatkowa"/></td>

                        <td class="col11"><xsl:value-of select="floor((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100))"/></td>
                        <td class="col12"><xsl:value-of select="round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) mod 1 * 100)"/></td>

                        <td class="col13"><xsl:value-of select="floor((ilosc * cena_jednostkowa * 100 - round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) * 100)) div 100)"/></td>
                        <td class="col14"><xsl:value-of select="(ilosc * cena_jednostkowa * 100 - round((ilosc * cena_jednostkowa) * (stawka_podatkowa div 100) * 100)) mod 100"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </div>

        <xsl:variable name="razem_netto">
            <xsl:call-template name="suma_wartosci"><xsl:with-param name="towary" select="faktura/lista_towarow/towar"/></xsl:call-template>
        </xsl:variable>

        <xsl:variable name="razem_podatek">
            <p><xsl:call-template name="suma_podatku"><xsl:with-param name="towary" select="faktura/lista_towarow/towar"/></xsl:call-template></p>
        </xsl:variable>

        <div id="razemWartZL" class="algnLeeft">
            <xsl:value-of select="floor($razem_netto div 100)"/>
        </div>
        <div id="razemWartGR" class="algnLeeft">
            <xsl:value-of select="$razem_netto mod 100"/>
        </div>

        <div id="podatekZL" class="algnLeeft">
            <xsl:value-of select="floor($razem_podatek div 100)"/>
        </div>
        <div id="podatekGR" class="algnLeeft">
            <xsl:value-of select="$razem_podatek mod 100"/>
        </div>

        <div id="bezPodatkuZL" class="algnLeeft">
            <xsl:value-of select="floor(($razem_netto - $razem_podatek) div 100)"/>
        </div>
        <div id="bezPodatkuGR" class="algnLeeft">
            <xsl:value-of select="($razem_netto - $razem_podatek) mod 100"/>
        </div>
    </body>
</html>
</xsl:template>

<xsl:template name="suma_wartosci">
    <xsl:param name="towary"/>
    <xsl:param name="suma" select="0"/>

    <xsl:choose>
        <xsl:when test="$towary">
            <xsl:call-template name="suma_wartosci">
                <xsl:with-param name="towary" select="$towary[position() &gt; 1]"/>
                <xsl:with-param name="suma" select="$suma + ($towary[1]/ilosc * 100 * $towary[1]/cena_jednostkowa)"/>
            </xsl:call-template>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="$suma"/>
        </xsl:otherwise>
    </xsl:choose>
</xsl:template>

<xsl:template name="suma_podatku">
    <xsl:param name="towary"/>
    <xsl:param name="suma" select="0"/>

    <xsl:choose>
        <xsl:when test="$towary">
            <xsl:call-template name="suma_podatku">
                <xsl:with-param name="towary" select="$towary[position() &gt; 1]"/>
                <xsl:with-param name="suma" select="$suma + round($towary[1]/ilosc * ($towary[1]/cena_jednostkowa) * $towary[1]/stawka_podatkowa) "/>
            </xsl:call-template>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="$suma"/>
        </xsl:otherwise>
    </xsl:choose>
</xsl:template>
</xsl:stylesheet>