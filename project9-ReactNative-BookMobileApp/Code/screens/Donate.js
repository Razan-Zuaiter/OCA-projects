import React from "react";
import {SafeAreaView,View,Text,TouchableOpacity,Image,ScrollView,FlatList,Alert,Linking,} from "react-native";
import { COLORS, FONTS, SIZES, icons, images } from "../constants";

const HorizontalLineDivider = () => {
    return (
        <View style={{ width: 1000, paddingTop: SIZES.radius }}>
            <View style={{ flex: 1, borderTopColor: COLORS.lightGray, borderTopWidth: 1 }}></View>
      </View>
    );
};
const Category = ({ navigation}) => {
  function renderHeader() {
    return (
      <View
        style={{
          flexDirection: "row",
          paddingHorizontal: SIZES.radius,
          marginTop:SIZES.base,
          height: 70,
          alignItems: "flex-end",
        }}>
        <TouchableOpacity
          style={{ marginLeft: SIZES.base }}
          onPress={() => navigation.navigate("Home")}>
          <Image
            source={icons.back_arrow_icon}
            resizeMode="contain"
            style={{width: 25,height: 25,tintColor: "#fff",}}
          />
        </TouchableOpacity>
        <View
          style={{
            flex: 1,
            alignItems: "center",
            justifyContent: "center",
            marginRight: 30,
          }}
        >
          <Text style={{ ...FONTS.h3, color: "white" }}>Donate</Text>
        </View>
      </View>
    );
  }
  function renderCategoryData() {
    return (
      <View 
        style={{
            paddingHorizontal: SIZES.radius, 
            flexDirection:"column",
            justifyContent:"center",
            alignItems:"center",
            }}>
            <View 
                style={{
                    backgroundColor: "rgba(102,140,255,0.1)",
                    paddingVertical:SIZES.padding3,
                    paddingHorizontal:SIZES.padding,}}>
            <Text 
                style={{
                    flex:1,color:"white",
                    ...FONTS.h1,textAlign:"center",
                    color:COLORS.primary,
                    marginBottom: SIZES.padding,}}>
               DONATE FOR A GOOD CAUSE
            </Text>
            <Text 
                style={{
                    color:COLORS.white,
                    textAlign:"center",
                    marginVertical: SIZES.padding,}}>
                Buy a book for you and for a kid who cant' buy one, all your donations will be gathered to buy books for student in schools located in the less fortunate districts.
            </Text>
            <View style={{ flexDirection: "row",padding:5}}>
                <Image
                  source={icons.phone}
                  resizeMode="contain"
                  style={{
                    width: 20,
                    height: 20,
                    tintColor: COLORS.primary,
                  }}
                />
                <Text style={{...FONTS.body4,color: COLORS.lightGray,paddingHorizontal: SIZES.radius,}}>
                    0786426862
                </Text>
              </View>
            <View style={{ flexDirection: "row",padding:5}}>
                <Image
                  source={icons.email}
                  resizeMode="contain"
                  style={{
                    width: 20,
                    height: 20,
                    tintColor: COLORS.primary,
                  }}
                />
                <Text style={{...FONTS.body4,color: COLORS.lightGray,paddingHorizontal: SIZES.radius,}}>
                    BookTime@mail.com
                </Text>
              </View>
            <View style={{ flexDirection: "row",padding:5}}>
                <Image
                  source={icons.bank}
                  resizeMode="contain"
                  style={{
                    width: 20,
                    height: 20,
                    tintColor: COLORS.primary,
                  }}
                />
                <Text style={{...FONTS.body4,color: COLORS.lightGray,paddingHorizontal: SIZES.radius,}}>
                    JO44 2000 0001 2345 6789 1234
                </Text>
              </View>
          {/* Donate button */}
        <TouchableOpacity
          style={{
            flex: 1,
            backgroundColor: COLORS.primary,
            marginHorizontal: SIZES.base,
            marginTop: SIZES.padding3,
            borderRadius: SIZES.radius,
            alignItems: "center",
            justifyContent: "center",
            paddingVertical:SIZES.padding,
            paddingHorizontal:SIZES.padding3,
          }}
          onPress={() => Linking.openURL("https://www.sandbox.paypal.com/webapps/hermes?flow=1-P&ulReturn=true&token=EC-0ET941739L6864335&rcache=2&country.x=CA&locale.x=en_US#/checkout/review")}
        >
          <Text style={{ ...FONTS.h3, color: COLORS.white }}>Donate Now</Text>
        </TouchableOpacity>
            </View>
      </View>
    );
  }
  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.black }}>
      {/* Header Section */}
      <View>
          {renderHeader()}
          {HorizontalLineDivider()}
      </View>
      {/* Body Section */}
      <ScrollView style={{ marginTop: SIZES.radius }}>
        {/* Categories Section */}
        <View style={{ marginTop: SIZES.padding }}>
          <View>{renderCategoryData()}</View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
};
export default Category;