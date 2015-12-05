<?php 

$xsdstring = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<!-- edited with XMLSpy v2010 rel. 3 (http://www.altova.com) by SAT (SAT) -->
<xs:schema xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xs="http://www.w3.org/2001/XMLSchema" targetNamespace="http://www.sat.gob.mx/cfd/3" elementFormDefault="qualified" attributeFormDefault="unqualified">
  <xs:element name="Comprobante">
    <xs:annotation>
      <xs:documentation>Estándar de Comprobante fiscal digital a través de Internet.</xs:documentation>
    </xs:annotation>
    <xs:complexType>
      <xs:sequence>
        <xs:element name="Emisor">
          <xs:annotation>
            <xs:documentation>Nodo requerido para expresar la información del contribuyente emisor del comprobante.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:element name="DomicilioFiscal" type="cfdi:t_UbicacionFiscal" minOccurs="0">
                <xs:annotation>
                  <xs:documentation>Nodo opcional para precisar la información de ubicación del domicilio fiscal del contribuyente emisor</xs:documentation>
                </xs:annotation>
              </xs:element>
              <xs:element name="ExpedidoEn" type="cfdi:t_Ubicacion" minOccurs="0">
                <xs:annotation>
                  <xs:documentation>Nodo opcional para precisar la información de ubicación del domicilio en donde es emitido el comprobante fiscal en caso de que sea distinto del domicilio fiscal del contribuyente emisor.</xs:documentation>
                </xs:annotation>
              </xs:element>
              <xs:sequence>
                <xs:element name="RegimenFiscal" maxOccurs="unbounded">
                  <xs:annotation>
                    <xs:documentation>Nodo requerido para incorporar los regímenes en los que tributa el contribuyente emisor. Puede contener más de un régimen.</xs:documentation>
                  </xs:annotation>
                  <xs:complexType>
                    <xs:attribute name="Regimen" use="required">
                      <xs:annotation>
                        <xs:documentation>Atributo requerido para incorporar el nombre del régimen en el que tributa el contribuyente emisor.</xs:documentation>
                      </xs:annotation>
                      <xs:simpleType>
                        <xs:restriction base="xs:string">
                          <xs:minLength value="1"/>
                          <xs:whiteSpace value="collapse"/>
                        </xs:restriction>
                      </xs:simpleType>
                    </xs:attribute>
                  </xs:complexType>
                </xs:element>
              </xs:sequence>
            </xs:sequence>
            <xs:attribute name="rfc" type="cfdi:t_RFC" use="required">
              <xs:annotation>
                <xs:documentation>Atributo requerido para la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente emisor del comprobante sin guiones o espacios.</xs:documentation>
              </xs:annotation>
            </xs:attribute>
            <xs:attribute name="nombre">
              <xs:annotation>
                <xs:documentation>Atributo opcional para el nombre, denominación o razón social del contribuyente emisor del comprobante.</xs:documentation>
              </xs:annotation>
              <xs:simpleType>
                <xs:restriction base="xs:string">
                  <xs:minLength value="1"/>
                  <xs:whiteSpace value="collapse"/>
                </xs:restriction>
              </xs:simpleType>
            </xs:attribute>
          </xs:complexType>
        </xs:element>
        <xs:element name="Receptor">
          <xs:annotation>
            <xs:documentation>Nodo requerido para precisar la información del contribuyente receptor del comprobante.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:element name="Domicilio" type="cfdi:t_Ubicacion" minOccurs="0">
                <xs:annotation>
                  <xs:documentation>Nodo opcional para la definición de la ubicación donde se da el domicilio del receptor del comprobante fiscal.</xs:documentation>
                </xs:annotation>
              </xs:element>
            </xs:sequence>
            <xs:attribute name="rfc" type="cfdi:t_RFC" use="required">
              <xs:annotation>
                <xs:documentation>Atributo requerido para precisar la Clave del Registro Federal de Contribuyentes correspondiente al contribuyente receptor del comprobante.</xs:documentation>
              </xs:annotation>
            </xs:attribute>
            <xs:attribute name="nombre" use="optional">
              <xs:annotation>
                <xs:documentation>Atributo opcional para el nombre, denominación o razón social del contribuyente receptor del comprobante.</xs:documentation>
              </xs:annotation>
              <xs:simpleType>
                <xs:restriction base="xs:string">
                  <xs:minLength value="1"/>
                  <xs:whiteSpace value="collapse"/>
                </xs:restriction>
              </xs:simpleType>
            </xs:attribute>
          </xs:complexType>
        </xs:element>
        <xs:element name="Conceptos">
          <xs:annotation>
            <xs:documentation>Nodo requerido para enlistar los conceptos cubiertos por el comprobante.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:element name="Concepto" maxOccurs="unbounded">
                <xs:annotation>
                  <xs:documentation>Nodo para introducir la información detallada de un bien o servicio amparado en el comprobante.</xs:documentation>
                </xs:annotation>
                <xs:complexType>
                  <xs:choice minOccurs="0">
                    <xs:element name="InformacionAduanera" type="cfdi:t_InformacionAduanera" minOccurs="0" maxOccurs="unbounded">
                      <xs:annotation>
                        <xs:documentation>Nodo opcional para introducir la información aduanera aplicable cuando se trate de ventas de primera mano de mercancías importadas.</xs:documentation>
                      </xs:annotation>
                    </xs:element>
                    <xs:element name="CuentaPredial" minOccurs="0">
                      <xs:annotation>
                        <xs:documentation>Nodo opcional para asentar el número de cuenta predial con el que fue registrado el inmueble, en el sistema catastral de la entidad federativa de que trate, o bien para incorporar los datos de identificación del certificado de participación inmobiliaria no amortizable.</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:attribute name="numero" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para precisar el número de la cuenta predial del inmueble cubierto por el presente concepto, o bien para incorporar los datos de identificación del certificado de participación inmobiliaria no amortizable, tratándose de arrendamiento.</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:whiteSpace value="collapse"/>
                              <xs:minLength value="1"/>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                      </xs:complexType>
                    </xs:element>
                    <xs:element name="ComplementoConcepto" minOccurs="0">
                      <xs:annotation>
                        <xs:documentation>Nodo opcional donde se incluirán los nodos complementarios de extensión al concepto, definidos por el SAT, de acuerdo a disposiciones particulares a un sector o actividad especifica.</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:sequence>
                          <xs:any minOccurs="0" maxOccurs="unbounded"/>
                        </xs:sequence>
                      </xs:complexType>
                    </xs:element>
                    <xs:element name="Parte" minOccurs="0" maxOccurs="unbounded">
                      <xs:annotation>
                        <xs:documentation>Nodo opcional para expresar las partes o componentes que integran la totalidad del concepto expresado en el comprobante fiscal digital a través de Internet</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:sequence>
                          <xs:element name="InformacionAduanera" type="cfdi:t_InformacionAduanera" minOccurs="0" maxOccurs="unbounded">
                            <xs:annotation>
                              <xs:documentation>Nodo opcional para introducir la información aduanera aplicable cuando se trate de partes o componentes importados vendidos de primera mano.</xs:documentation>
                            </xs:annotation>
                          </xs:element>
                        </xs:sequence>
                        <xs:attribute name="cantidad" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para precisar la cantidad de bienes o servicios del tipo particular definido por la presente parte.</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:decimal">
                              <xs:whiteSpace value="collapse"/>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="unidad" use="optional">
                          <xs:annotation>
                            <xs:documentation>Atributo opcional para precisar la unidad de medida aplicable para la cantidad expresada en la parte.</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:whiteSpace value="collapse"/>
                              <xs:minLength value="1"/>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="noIdentificacion" use="optional">
                          <xs:annotation>
                            <xs:documentation>Atributo opcional para expresar el número de serie del bien o identificador del servicio amparado por la presente parte.</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:minLength value="1"/>
                              <xs:whiteSpace value="collapse"/>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="descripcion" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para precisar la descripción del bien o servicio cubierto por la presente parte.</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:minLength value="1"/>
                              <xs:whiteSpace value="collapse"/>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="valorUnitario" type="cfdi:t_Importe" use="optional">
                          <xs:annotation>
                            <xs:documentation>Atributo opcional para precisar el valor o precio unitario del bien o servicio cubierto por la presente parte.</xs:documentation>
                          </xs:annotation>
                        </xs:attribute>
                        <xs:attribute name="importe" type="cfdi:t_Importe" use="optional">
                          <xs:annotation>
                            <xs:documentation>Atributo opcional para precisar el importe total de los bienes o servicios de la presente parte. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en la parte.</xs:documentation>
                          </xs:annotation>
                        </xs:attribute>
                      </xs:complexType>
                    </xs:element>
                  </xs:choice>
                  <xs:attribute name="cantidad" use="required">
                    <xs:annotation>
                      <xs:documentation>Atributo requerido para precisar la cantidad de bienes o servicios del tipo particular definido por el presente concepto.</xs:documentation>
                    </xs:annotation>
                    <xs:simpleType>
                      <xs:restriction base="xs:decimal">
                        <xs:whiteSpace value="collapse"/>
                      </xs:restriction>
                    </xs:simpleType>
                  </xs:attribute>
                  <xs:attribute name="unidad" use="required">
                    <xs:annotation>
                      <xs:documentation>Atributo requerido para precisar la unidad de medida aplicable para la cantidad expresada en el concepto.</xs:documentation>
                    </xs:annotation>
                    <xs:simpleType>
                      <xs:restriction base="xs:string">
                        <xs:whiteSpace value="collapse"/>
                        <xs:minLength value="1"/>
                      </xs:restriction>
                    </xs:simpleType>
                  </xs:attribute>
                  <xs:attribute name="noIdentificacion" use="optional">
                    <xs:annotation>
                      <xs:documentation>Atributo opcional para expresar el número de serie del bien o identificador del servicio amparado por el presente concepto.</xs:documentation>
                    </xs:annotation>
                    <xs:simpleType>
                      <xs:restriction base="xs:string">
                        <xs:minLength value="1"/>
                        <xs:whiteSpace value="collapse"/>
                      </xs:restriction>
                    </xs:simpleType>
                  </xs:attribute>
                  <xs:attribute name="descripcion" use="required">
                    <xs:annotation>
                      <xs:documentation>Atributo requerido para precisar la descripción del bien o servicio cubierto por el presente concepto.</xs:documentation>
                    </xs:annotation>
                    <xs:simpleType>
                      <xs:restriction base="xs:string">
                        <xs:minLength value="1"/>
                        <xs:whiteSpace value="collapse"/>
                      </xs:restriction>
                    </xs:simpleType>
                  </xs:attribute>
                  <xs:attribute name="valorUnitario" type="cfdi:t_Importe" use="required">
                    <xs:annotation>
                      <xs:documentation>Atributo requerido para precisar el valor o precio unitario del bien o servicio cubierto por el presente concepto.</xs:documentation>
                    </xs:annotation>
                  </xs:attribute>
                  <xs:attribute name="importe" type="cfdi:t_Importe" use="required">
                    <xs:annotation>
                      <xs:documentation>Atributo requerido para precisar el importe total de los bienes o servicios del presente concepto. Debe ser equivalente al resultado de multiplicar la cantidad por el valor unitario expresado en el concepto.</xs:documentation>
                    </xs:annotation>
                  </xs:attribute>
                </xs:complexType>
              </xs:element>
            </xs:sequence>
          </xs:complexType>
        </xs:element>
        <xs:element name="Impuestos">
          <xs:annotation>
            <xs:documentation>Nodo requerido para capturar los impuestos aplicables.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:element name="Retenciones" minOccurs="0">
                <xs:annotation>
                  <xs:documentation>Nodo opcional para capturar los impuestos retenidos aplicables</xs:documentation>
                </xs:annotation>
                <xs:complexType>
                  <xs:sequence>
                    <xs:element name="Retencion" maxOccurs="unbounded">
                      <xs:annotation>
                        <xs:documentation>Nodo para la información detallada de una retención de impuesto específico</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:attribute name="impuesto" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para señalar el tipo de impuesto retenido</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:whiteSpace value="collapse"/>
                              <xs:enumeration value="ISR">
                                <xs:annotation>
                                  <xs:documentation>Impuesto sobre la renta</xs:documentation>
                                </xs:annotation>
                              </xs:enumeration>
                              <xs:enumeration value="IVA">
                                <xs:annotation>
                                  <xs:documentation>Impuesto al Valor Agregado</xs:documentation>
                                </xs:annotation>
                              </xs:enumeration>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="importe" type="cfdi:t_Importe" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para señalar el importe o monto del impuesto retenido</xs:documentation>
                          </xs:annotation>
                        </xs:attribute>
                      </xs:complexType>
                    </xs:element>
                  </xs:sequence>
                </xs:complexType>
              </xs:element>
              <xs:element name="Traslados" minOccurs="0">
                <xs:annotation>
                  <xs:documentation>Nodo opcional para asentar o referir los impuestos trasladados aplicables</xs:documentation>
                </xs:annotation>
                <xs:complexType>
                  <xs:sequence>
                    <xs:element name="Traslado" maxOccurs="unbounded">
                      <xs:annotation>
                        <xs:documentation>Nodo para la información detallada de un traslado de impuesto específico</xs:documentation>
                      </xs:annotation>
                      <xs:complexType>
                        <xs:attribute name="impuesto" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para señalar el tipo de impuesto trasladado</xs:documentation>
                          </xs:annotation>
                          <xs:simpleType>
                            <xs:restriction base="xs:string">
                              <xs:whiteSpace value="collapse"/>
                              <xs:enumeration value="IVA">
                                <xs:annotation>
                                  <xs:documentation>Impuesto al Valor Agregado</xs:documentation>
                                </xs:annotation>
                              </xs:enumeration>
                              <xs:enumeration value="IEPS">
                                <xs:annotation>
                                  <xs:documentation>Impuesto especial sobre productos y servicios</xs:documentation>
                                </xs:annotation>
                              </xs:enumeration>
                            </xs:restriction>
                          </xs:simpleType>
                        </xs:attribute>
                        <xs:attribute name="tasa" type="cfdi:t_Importe" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para señalar la tasa del impuesto que se traslada por cada concepto amparado en el comprobante</xs:documentation>
                          </xs:annotation>
                        </xs:attribute>
                        <xs:attribute name="importe" type="cfdi:t_Importe" use="required">
                          <xs:annotation>
                            <xs:documentation>Atributo requerido para señalar el importe del impuesto trasladado</xs:documentation>
                          </xs:annotation>
                        </xs:attribute>
                      </xs:complexType>
                    </xs:element>
                  </xs:sequence>
                </xs:complexType>
              </xs:element>
            </xs:sequence>
            <xs:attribute name="totalImpuestosRetenidos" type="cfdi:t_Importe" use="optional">
              <xs:annotation>
                <xs:documentation>Atributo opcional para expresar el total de los impuestos retenidos que se desprenden de los conceptos expresados en el comprobante fiscal digital a través de Internet.</xs:documentation>
              </xs:annotation>
            </xs:attribute>
            <xs:attribute name="totalImpuestosTrasladados" type="cfdi:t_Importe" use="optional">
              <xs:annotation>
                <xs:documentation>Atributo opcional para expresar el total de los impuestos trasladados que se desprenden de los conceptos expresados en el comprobante fiscal digital a través de Internet.</xs:documentation>
              </xs:annotation>
            </xs:attribute>
          </xs:complexType>
        </xs:element>
        <xs:element name="Complemento" minOccurs="0">
          <xs:annotation>
            <xs:documentation>Nodo opcional donde se incluirá el complemento Timbre Fiscal Digital de manera obligatoria y los nodos complementarios determinados por el SAT, de acuerdo a las disposiciones particulares a un sector o actividad específica.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:any minOccurs="0" maxOccurs="unbounded"/>
            </xs:sequence>
          </xs:complexType>
        </xs:element>
        <xs:element name="Addenda" minOccurs="0">
          <xs:annotation>
            <xs:documentation>Nodo opcional para recibir las extensiones al presente formato que sean de utilidad al contribuyente. Para las reglas de uso del mismo, referirse al formato de origen.</xs:documentation>
          </xs:annotation>
          <xs:complexType>
            <xs:sequence>
              <xs:any minOccurs="0" maxOccurs="unbounded"/>
            </xs:sequence>
          </xs:complexType>
        </xs:element>
      </xs:sequence>
      <xs:attribute name="version" use="required" fixed="3.2">
        <xs:annotation>
          <xs:documentation>Atributo requerido con valor prefijado a 3.2 que indica la versión del estándar bajo el que se encuentra expresado el comprobante.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="serie" use="optional">
        <xs:annotation>
          <xs:documentation>Atributo opcional para precisar la serie para control interno del contribuyente. Este atributo acepta una cadena de caracteres alfabéticos de 1 a 25 caracteres sin incluir caracteres acentuados.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="1"/>
            <xs:maxLength value="25"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="folio">
        <xs:annotation>
          <xs:documentation>Atributo opcional para control interno del contribuyente que acepta un valor numérico entero superior a 0 que expresa el folio del comprobante.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="1"/>
            <xs:maxLength value="20"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="fecha" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para la expresión de la fecha y hora de expedición  del comprobante fiscal. Se expresa en la forma aaaa-mm-ddThh:mm:ss, de acuerdo con la especificación ISO 8601.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:dateTime">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="sello" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para contener el sello digital del comprobante fiscal, al que hacen referencia las reglas de resolución miscelánea aplicable. El sello deberá ser expresado cómo una cadena de texto en formato Base 64.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="formaDePago" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para precisar la forma de pago que aplica para este comprobnante fiscal digital a través de Internet. Se utiliza para expresar Pago en una sola exhibición o número de parcialidad pagada contra el total de parcialidades, Parcialidad 1 de X. </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="noCertificado" use="required">
        <xs:annotation>
          <xs:documentation> Atributo requerido para expresar el número de serie del certificado de sello digital que ampara al comprobante, de acuerdo al acuse correspondiente a 20 posiciones otorgado por el sistema del SAT.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:length value="20"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="certificado" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido que sirve para expresar el certificado de sello digital que ampara al comprobante como texto, en formato base 64.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="condicionesDePago" use="optional">
        <xs:annotation>
          <xs:documentation>Atributo opcional para expresar las condiciones comerciales aplicables para el pago del comprobante fiscal digital a través de Internet.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
            <xs:minLength value="1"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="subTotal" type="cfdi:t_Importe" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para representar la suma de los importes antes de descuentos e impuestos.</xs:documentation>
        </xs:annotation>
      </xs:attribute>
      <xs:attribute name="descuento" type="cfdi:t_Importe" use="optional">
        <xs:annotation>
          <xs:documentation>Atributo opcional para representar el importe total de los descuentos aplicables antes de impuestos.</xs:documentation>
        </xs:annotation>
      </xs:attribute>
      <xs:attribute name="motivoDescuento" use="optional">
        <xs:annotation>
          <xs:documentation>Atributo opcional para expresar el motivo del descuento aplicable.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="1"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="TipoCambio">
        <xs:annotation>
          <xs:documentation>Atributo opcional para representar el tipo de cambio conforme a la moneda usada</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="Moneda">
        <xs:annotation>
          <xs:documentation>Atributo opcional para expresar la moneda utilizada para expresar los montos </xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="total" type="cfdi:t_Importe" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para representar la suma del subtotal, menos los descuentos aplicables, más los impuestos trasladados, menos los impuestos retenidos.</xs:documentation>
        </xs:annotation>
      </xs:attribute>
      <xs:attribute name="tipoDeComprobante" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para expresar el efecto del comprobante fiscal para el contribuyente emisor.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:enumeration value="ingreso"/>
            <xs:enumeration value="egreso"/>
            <xs:enumeration value="traslado"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="metodoDePago" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido de texto libre para expresar el método de pago de los bienes o servicios amparados por el comprobante. Se entiende como método de pago leyendas tales como: cheque, tarjeta de crédito o debito, depósito en cuenta, etc.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="1"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="LugarExpedicion" use="required">
        <xs:annotation>
          <xs:documentation>Atributo requerido para incorporar el lugar de expedición del comprobante.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="1"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="NumCtaPago">
        <xs:annotation>
          <xs:documentation>Atributo Opcional para incorporar al menos los cuatro últimos digitos del número de cuenta con la que se realizó el pago.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:minLength value="4"/>
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="FolioFiscalOrig">
        <xs:annotation>
          <xs:documentation>Atributo opcional para señalar el número de folio fiscal del comprobante que se hubiese expedido por el valor total del comprobante, tratándose del pago en parcialidades.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="SerieFolioFiscalOrig">
        <xs:annotation>
          <xs:documentation>Atributo opcional para señalar la serie del folio del comprobante que se hubiese expedido por el valor total del comprobante, tratándose del pago en parcialidades.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:string">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="FechaFolioFiscalOrig">
        <xs:annotation>
          <xs:documentation>Atributo opcional para señalar la fecha de expedición del comprobante que se hubiese emitido por el valor total del comprobante, tratándose del pago en parcialidades. Se expresa en la forma aaaa-mm-ddThh:mm:ss, de acuerdo con la especificación ISO 8601.</xs:documentation>
        </xs:annotation>
        <xs:simpleType>
          <xs:restriction base="xs:dateTime">
            <xs:whiteSpace value="collapse"/>
          </xs:restriction>
        </xs:simpleType>
      </xs:attribute>
      <xs:attribute name="MontoFolioFiscalOrig" type="cfdi:t_Importe">
        <xs:annotation>
          <xs:documentation>Atributo opcional para señalar el total del comprobante que se hubiese expedido por el valor total de la operación, tratándose del pago en parcialidades</xs:documentation>
        </xs:annotation>
      </xs:attribute>
    </xs:complexType>
  </xs:element>
  <xs:complexType name="t_Ubicacion">
    <xs:annotation>
      <xs:documentation>Tipo definido para expresar domicilios o direcciones</xs:documentation>
    </xs:annotation>
    <xs:attribute name="calle" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para precisar la avenida, calle, camino o carretera donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="noExterior" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para expresar el número particular en donde se da la ubicación sobre una calle dada.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="noInterior" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para expresar información adicional para especificar la ubicación cuando calle y número exterior (noExterior) no resulten suficientes para determinar la ubicación de forma precisa.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="colonia" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para precisar la colonia en donde se da la ubicación cuando se desea ser más específico en casos de ubicaciones urbanas.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="localidad" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional que sirve para precisar la ciudad o población donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="referencia" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional para expresar una referencia de ubicación adicional.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="municipio" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional que sirve para precisar el municipio o delegación (en el caso del Distrito Federal) en donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="estado" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional que sirve para precisar el estado o entidad federativa donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="pais" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido que sirve para precisar el país donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="codigoPostal" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional que sirve para asentar el código postal en donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
  </xs:complexType>
  <xs:complexType name="t_UbicacionFiscal">
    <xs:annotation>
      <xs:documentation>Tipo definido para expresar domicilios o direcciones</xs:documentation>
    </xs:annotation>
    <xs:attribute name="calle" use="required">
      <xs:annotation>
        <xs:documentation>Este atributo requerido sirve para precisar la avenida, calle, camino o carretera donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="noExterior" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para expresar el número particular en donde se da la ubicación sobre una calle dada.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="noInterior" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para expresar información adicional para especificar la ubicación cuando calle y número exterior (noExterior) no resulten suficientes para determinar la ubicación de forma precisa.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="colonia" use="optional">
      <xs:annotation>
        <xs:documentation>Este atributo opcional sirve para precisar la colonia en donde se da la ubicación cuando se desea ser más específico en casos de ubicaciones urbanas.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="localidad" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional que sirve para precisar la ciudad o población donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="referencia" use="optional">
      <xs:annotation>
        <xs:documentation>Atributo opcional para expresar una referencia de ubicación adicional.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:whiteSpace value="collapse"/>
          <xs:minLength value="1"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="municipio" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido que sirve para precisar el municipio o delegación (en el caso del Distrito Federal) en donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="estado" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido que sirve para precisar el estado o entidad federativa donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="pais" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido que sirve para precisar el país donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="codigoPostal" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido que sirve para asentar el código postal en donde se da la ubicación.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:whiteSpace value="collapse"/>
          <xs:length value="5"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
  </xs:complexType>
  <xs:simpleType name="t_RFC">
    <xs:annotation>
      <xs:documentation>Tipo definido para expresar claves del Registro Federal de Contribuyentes</xs:documentation>
    </xs:annotation>
    <xs:restriction base="xs:string">
      <xs:minLength value="12"/>
      <xs:maxLength value="13"/>
      <xs:whiteSpace value="collapse"/>
      <xs:pattern value="[A-Z,Ñ,&amp;]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?"/>
    </xs:restriction>
  </xs:simpleType>
  <xs:simpleType name="t_Importe">
    <xs:annotation>
      <xs:documentation>Tipo definido para expresar importes numéricos con fracción hasta seis decimales</xs:documentation>
    </xs:annotation>
    <xs:restriction base="xs:decimal">
      <xs:fractionDigits value="6"/>
      <xs:whiteSpace value="collapse"/>
    </xs:restriction>
  </xs:simpleType>
  <xs:complexType name="t_InformacionAduanera">
    <xs:annotation>
      <xs:documentation>Tipo definido para expresar información aduanera</xs:documentation>
    </xs:annotation>
    <xs:attribute name="numero" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido para expresar el número del documento aduanero que ampara la importación del bien.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="fecha" use="required">
      <xs:annotation>
        <xs:documentation>Atributo requerido para expresar la fecha de expedición del documento aduanero que ampara la importación del bien. Se expresa en el formato aaaa-mm-dd</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:date">
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
    <xs:attribute name="aduana">
      <xs:annotation>
        <xs:documentation>Atributo opcional para precisar el nombre de la aduana por la que se efectuó la importación del bien.</xs:documentation>
      </xs:annotation>
      <xs:simpleType>
        <xs:restriction base="xs:string">
          <xs:minLength value="1"/>
          <xs:whiteSpace value="collapse"/>
        </xs:restriction>
      </xs:simpleType>
    </xs:attribute>
  </xs:complexType>
</xs:schema>
XML;

$doc = new DOMDocument();
$doc->loadXML(mb_convert_encoding($xsdstring, 'utf-8', mb_detect_encoding($xsdstring)));
$xpath = new DOMXPath($doc);
$xpath->registerNamespace('xs', 'http://www.w3.org/2001/XMLSchema');

function echoElements($indent, $elementDef) {
  global $doc, $xpath;
  echo "<div>" . $indent . $elementDef->getAttribute('name') . "</div>\n";
  $elementDefs = $xpath->evaluate("xs:complexType/xs:sequence/xs:element", $elementDef);
  foreach($elementDefs as $elementDef) {
    echoElements($indent . "&nbsp;&nbsp;&nbsp;&nbsp;", $elementDef);
  }
}

$elementDefs = $xpath->evaluate("/xs:schema/xs:element");
foreach($elementDefs as $elementDef) {
  echoElements("", $elementDef);
}                       
?>