import React, { useContext, useState } from "react";
import {View,Text, ImageBackground,TouchableOpacity,Image,ScrollView,Animated,Linking,Alert} from "react-native";
import { FONTS, COLORS, SIZES, icons } from "../constants";
import BookContext from "../useContext/BookContext";

const LineDivider = () => {
  return (
    <View style={{ width: 1, paddingVertical: 5 }}>
      <View
        style={{
          flex: 1,
          borderLeftColor: COLORS.lightGray2,
          borderLeftWidth: 1,
        }}
      ></View>
    </View>
  );
};

const BookDetail = ({ route, navigation }) => {
  const { marks, setMarks } = useContext(BookContext);
  const [book, setBook] = React.useState(null);
  const [scrollViewWholeHeight, setScrollViewWholeHeight] = React.useState(1);
  const [scrollViewVisibleHeight, setScrollViewVisibleHeight] = React.useState(0);
  const indicator = new Animated.Value(0);
  React.useEffect(() => {
    let { book } = route.params;
    setBook(book);
  });

  function renderBookInfoSection() {
    return (
      <View style={{ flex: 1 }}>
        <ImageBackground
          source={book.bookCover}
          resizeMode="cover"
          style={{
            position: "absolute",
            top: 0,
            right: 0,
            bottom: 0,
            left: 0,
          }}
        />

        {/* Color Overlay */}
        <View
          style={{
            position: "absolute",
            top: 0,
            right: 0,
            bottom: 0,
            left: 0,
            backgroundColor: book.backgroundColor,
          }}
        ></View>

        {/* Navigation header */}
        <View
          style={{
            flexDirection: "row",
            paddingHorizontal: SIZES.radius,
            height: 70,
            alignItems: "flex-end",
          }}
        >
          <TouchableOpacity
            style={{ marginLeft: SIZES.base }}
            onPress={() => navigation.goBack()}
          >
            <Image
              source={icons.back_arrow_icon}
              resizeMode="contain"
              style={{
                width: 25,
                height: 25,
                tintColor: book.navTintColor,
              }}
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
            <Text style={{ ...FONTS.h3, color: book.navTintColor }}>
              {book.bookName}
            </Text>
          </View>
        </View>

        {/* Book Cover */}
        <View style={{ flex: 5, paddingTop: SIZES.base, alignItems: "center" }}>
          <Image
            source={book.bookCover}
            resizeMode="contain"
            style={{
              flex: 1,
              width: 400,
              height: "auto",
            }}
          />
        </View>
        {/* Book Info */}
        <View
          style={{
            flexDirection: "row",
            paddingVertical: 11,
            margin: SIZES.padding,
            borderRadius: SIZES.radius,
            backgroundColor: "rgba(0,0,0,0.3)",
          }}
        >
          {/* Rating */}
          <View style={{ flex: 1, alignItems: "center" }}>
            <Text style={{ ...FONTS.h3, color: COLORS.white }}>
              {book.rating}
            </Text>
            <Text style={{ ...FONTS.body4, color: COLORS.white }}>Rating</Text>
          </View>

          <LineDivider />

          {/* Pages */}
          <View
            style={{
              flex: 1,
              paddingHorizontal: SIZES.radius,
              alignItems: "center",
            }}
          >
            <Text style={{ ...FONTS.h3, color: COLORS.white }}>
              {book.pageNo}
            </Text>
            <Text style={{ ...FONTS.body4, color: COLORS.white }}>
              Number of Page
            </Text>
          </View>

          <LineDivider />

          {/* Language */}
          <View style={{ flex: 1, alignItems: "center" }}>
            <Text style={{ ...FONTS.h3, color: COLORS.white }}>
              {book.language}
            </Text>
            <Text style={{ ...FONTS.body4, color: COLORS.white }}>
              Language
            </Text>
          </View>
        </View>
      </View>
    );
  }

  function renderBookDescription() {
    const indicatorSize =
      scrollViewWholeHeight > scrollViewVisibleHeight
        ? (scrollViewVisibleHeight * scrollViewVisibleHeight) /
          scrollViewWholeHeight
        : scrollViewVisibleHeight;

    const difference =
      scrollViewVisibleHeight > indicatorSize
        ? scrollViewVisibleHeight - indicatorSize
        : 1;

    return (
      <View style={{ flex: 1, flexDirection: "row", padding: SIZES.padding }}>
        {/* Custom Scrollbar */}
        <View
          style={{ width: 4, height: "100%", backgroundColor: COLORS.gray1 }}
        >
          <Animated.View
            style={{
              width: 4,
              height: indicatorSize,
              backgroundColor: COLORS.lightGray4,
              transform: [
                {
                  translateY: Animated.multiply(
                    indicator,
                    scrollViewVisibleHeight / scrollViewWholeHeight
                  ).interpolate({
                    inputRange: [0, difference],
                    outputRange: [0, difference],
                    extrapolate: "clamp",
                  }),
                },
              ],
            }}
          />
        </View>

        {/* Description */}
        <ScrollView
          contentContainerStyle={{ paddingLeft: SIZES.padding2 }}
          showsVerticalScrollIndicator={false}
          scrollEventThrottle={16}
          onContentSizeChange={(width, height) => {
            setScrollViewWholeHeight(height);
          }}
          onLayout={({
            nativeEvent: {
              layout: { x, y, width, height },
            },
          }) => {
            setScrollViewVisibleHeight(height);
          }}
          onScroll={Animated.event(
            [{ nativeEvent: { contentOffset: { y: indicator } } }],
            { useNativeDriver: false }
          )}
        >
          <Text style={{ ...FONTS.h2, color: COLORS.white }}>Description</Text>
          <Text style={{ ...FONTS.body3, color: COLORS.lightGray }}>
            {book.description}
          </Text>
        </ScrollView>
      </View>
    );
  }

  function renderBottomButton() {
    {/*Start Add Book mark to thelocalStorge*/}

    const addBookMark = (value) => {
      let newElement = value;
      if (!marks) {
        // if it created for first time
        setMarks([newElement]);
        Alert.alert(
          "Bookmarked!",
          `you added ${newElement.bookName} to your Bookmarks`
        );
      } else {
        // to add or remove  if already exitist
        let isExist = marks.some((a) => a.bookName == newElement.bookName);

        if (!isExist) {
          // add new item if it is not exist
          let newArray1 = [...marks, { ...newElement }];
          setMarks(newArray1);

          Alert.alert(
            "Bookmarked!",
            `you added ${newElement.bookName} to your BookMarks`
          );
        } else {
          // remove the item if it is already exist
          let newArray2 = marks.filter(
            (a) => a.bookName !== newElement.bookName
          );
          setMarks(newArray2);
          Alert.alert(
            "Bookmarked!",
            `you removed ${newElement.bookName} from your Bookmarks`
          );
        }
      }
    };
    {/*End Add Book mark to thelocalStorge*/}

    return (
      <View style={{ flex: 1, flexDirection: "row" }}>
        {/* Bookmark */}
        <TouchableOpacity
          style={{
            width: 60,
            backgroundColor: COLORS.secondary,
            marginLeft: SIZES.padding,
            marginVertical: SIZES.base,
            borderRadius: SIZES.radius,
            alignItems: "center",
            justifyContent: "center",
          }}
          onPress={() => addBookMark(book)}
        >
          <Image
            source={icons.bookmark_icon}
            resizeMode="contain"
            style={[
              !marks.some((a) => a.bookName == book.bookName)
                ? { width: 25, height: 25, tintColor: "gray" }
                : { width: 25, height: 25, tintColor:COLORS.lightRed },
            ]}
          />
        </TouchableOpacity>

        {/* Start Reading */}
        <TouchableOpacity
          style={{
            flex: 1,
            backgroundColor: COLORS.primary,
            marginHorizontal: SIZES.base,
            marginVertical: SIZES.base,
            borderRadius: SIZES.radius,
            alignItems: "center",
            justifyContent: "center",
          }}
          onPress={() => Linking.openURL(book.link)}
        >
          <Text style={{ ...FONTS.h3, color: COLORS.white }}>Buy Now</Text>
        </TouchableOpacity>
      </View>
    );
  }

  if (book) {
    return (
      <View style={{ flex: 1, backgroundColor: COLORS.black }}>
        {/* Book Cover Section */}
        <View style={{ flex: 4 }}>{renderBookInfoSection()}</View>

        {/* Description */}
        <View style={{ flex: 2 }}>{renderBookDescription()}</View>

        {/* Buttons */}
        <View style={{ height: 70, marginBottom: 30 }}>
          {renderBottomButton()}
        </View>
      </View>
    );
  } else {
    return <></>;
  }
};

export default BookDetail;
