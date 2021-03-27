import React, { useState, useEffect, useContext } from "react";
import {SafeAreaView,View,  Text,TouchableOpacity,Image,FlatList,Alert,} from "react-native";
import { Colors } from "react-native/Libraries/NewAppScreen";
import { COLORS, FONTS, SIZES, icons} from "../constants";
import BookContext from "../useContext/BookContext";

const HorizontalLineDivider = () => {
  return (
      <View style={{ width: 1000, paddingTop: SIZES.radius}}>
          <View style={{ flex: 1, borderTopColor: COLORS.lightGray, borderTopWidth: 1 }}></View>
    </View>
  );
};
const BookMarks = ({navigation }) => {
  const { marks, setMarks } = useContext(BookContext);
  function renderHeader() {
    return (
      <View
        style={{
          flexDirection: "row",
          paddingHorizontal: SIZES.radius,
          height: 70,
          alignItems: "flex-end",
          marginTop:SIZES.radius
        }}>
        <TouchableOpacity
          style={{ marginLeft: SIZES.base }}
          onPress={() => navigation.goBack()}>
          <Image
            source={icons.back_arrow_icon}
            resizeMode="contain"
          style={{width: 25,height: 25,tintColor: "#fff",marginBottom:SIZES.radius,}}
          />
        </TouchableOpacity>
        <View
          style={{
            flex: 1,
            alignItems: "center",
            justifyContent: "center",
            marginRight: 30,
            marginBottom:SIZES.radius,
          }}
        >
          <Text style={{ ...FONTS.h3, color: "white",}}>My Bookmarks</Text>
        </View>
      </View>
    );
  }

  function renderAllBookMark() {
    /*Start Add Book mark to thelocalStorge*/
    const addBookMark =  (value) => {
        let newElement = value.item;
        // to remove  from
        let newArray2 = marks.filter((a) => a.bookName !== newElement.bookName);
        setMarks(newArray2);
        Alert.alert(
          "Bookmarked!",
          `you removed ${newElement.bookName} from your Bookmarks`
        );
    };

    const renderItem = ({ item }) => {
      return (
        <View style={{ marginVertical: SIZES.radius,paddingLeft: SIZES.padding}}>
          <TouchableOpacity
            style={{ flex: 1, flexDirection: "row" }}
            onPress={() =>
              navigation.navigate("BookDetail", {
                book: item,
              })
            }
          >
            {/* Book Cover */}
            <Image
              source={item.bookCover}
              resizeMode="cover"
              style={{ width: 100, height: 150, borderRadius: 10 }}
            />
            <View style={{ flex: 1, marginLeft: SIZES.radius }}>
              {/* Book name and author */}
              <View>
                <Text
                  style={{
                    paddingRight: SIZES.padding,
                    ...FONTS.h3,
                    color: COLORS.white,
                  }}
                >
                  {item.bookName}
                </Text>
                <Text style={{ ...FONTS.h4, color: COLORS.lightGray }}>
                  {item.author}
                </Text>
              </View>
              {/* Book Info */}
              <View style={{ flexDirection: "row", marginTop: SIZES.radius }}>
                <Image
                  source={icons.page_filled_icon}
                  resizeMode="contain"
                  style={{width: 20,height: 20,tintColor: COLORS.lightGray,}}
                />
                <Text
                  style={{
                    ...FONTS.body4,
                    color: COLORS.lightGray,
                    paddingHorizontal: SIZES.radius,
                  }}
                >
                  {item.pageNo}
                </Text>
              </View>

              {/* Genre */}
              <View style={{ flexDirection: "row", marginTop: SIZES.base }}>
                {item.genre.includes("Adventure") && (
                  <View
                    style={{
                      justifyContent: "center",
                      alignItems: "center",
                      padding: SIZES.base,
                      marginRight: SIZES.base,
                      backgroundColor: COLORS.darkGreen,
                      height: 40,
                      borderRadius: SIZES.radius,
                    }}
                  >
                    <Text style={{ ...FONTS.body3, color: COLORS.lightGreen }}>
                      Adventure
                    </Text>
                  </View>
                )}
                {item.genre.includes("Romance") && (
                  <View
                    style={{
                      justifyContent: "center",
                      alignItems: "center",
                      padding: SIZES.base,
                      marginRight: SIZES.base,
                      backgroundColor: COLORS.darkRed,
                      height: 40,
                      borderRadius: SIZES.radius,
                    }}
                  >
                    <Text style={{ ...FONTS.body3, color: COLORS.lightRed }}>
                      Romance
                    </Text>
                  </View>
                )}
                {item.genre.includes("Drama") && (
                  <View
                    style={{
                      justifyContent: "center",
                      alignItems: "center",
                      padding: SIZES.base,
                      marginRight: SIZES.base,
                      backgroundColor: COLORS.darkBlue,
                      height: 40,
                      borderRadius: SIZES.radius,
                    }}
                  >
                    <Text style={{ ...FONTS.body3, color: COLORS.lightBlue }}>
                      Drama
                    </Text>
                  </View>
                )}
              </View>
            </View>
          </TouchableOpacity>

          {/* Bookmark Button */}
          <TouchableOpacity
            style={{ position: "absolute", top: 5, right: 15 }}
            onPress={() => addBookMark({ item })}
          >
            <Image
              source={icons.bookmark_icon}
              resizeMode="contain"
              style={{width: 20, height: 20, tintColor:COLORS.lightRed}}
            />
          </TouchableOpacity>
        </View>
      );
    };

    return (
      <View style={{ flex: 1, marginTop: SIZES.radius}}>
        <FlatList
          data={marks}
          renderItem={renderItem}
          keyExtractor={(item) => `${item.id}`}
          showsVerticalScrollIndicator={false}
        />
      </View>
    );
  }
  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.black }}>
      {/* Header Section */}
      {renderHeader()}
      {HorizontalLineDivider()}
      {renderAllBookMark()}
      {!(marks.length > 0) ? (
        <TouchableOpacity onPress={() => navigation.navigate("Home")}>
          <View>
            <Text
              style={{
                color:COLORS.lightGray,
                fontSize: 17,
                borderWidth: 2,
                borderColor:COLORS.lightGray,
                padding: 21,
                textAlign: "center",
                margin: 23,
              }}
            >
              You have no bookmarks. Add books to you bookmark
            </Text>
          </View>
        </TouchableOpacity>
      ) : (
        <View></View>
      )}
      {/* </View> */}
    </SafeAreaView>
  );
};
export default BookMarks;
