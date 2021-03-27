import React, { useState, useContext } from "react";
import {
  SafeAreaView,
  View,
  Text,
  TouchableOpacity,
  Image,
  ScrollView,
  FlatList,
  Alert,
  YellowBox,
} from "react-native";
import { COLORS, FONTS, SIZES, icons} from "../constants";
import BookContext from "../useContext/BookContext";
import myBooksData from "../data/books";
import categoriesData from "../data/categories";

const HorizontalLineDivider = () => {
  return (
    <View style={{ width: 1000, paddingTop: SIZES.padding }}>
      <View
        style={{ flex: 1, borderTopColor: COLORS.lightGray, borderTopWidth: 1 }}
      ></View>
    </View>
  );
};
console.disableYellowBox = true;
const Home = ({ navigation }) => {
  const [myBooks, setMyBooks] = useState(myBooksData);
  const [categories, setCategories] = useState(categoriesData);
  const { marks, setMarks } = useContext(BookContext);
  const [selectedCategory, setSelectedCategory] = useState(1);

  function renderHeader() {
    return (
      <View
        style={{
          flex: 1,
          flexDirection: "row",
          paddingTop: SIZES.padding3,
          paddingHorizontal: SIZES.padding,
          alignItems: "center",
        }}
      >
        {/* Greetings */}
        <View style={{ marginRight: SIZES.base }}>
          <Image
            source={icons.books}
            resizeMode="contain"
            style={{ tintColor: COLORS.white, width: 30, height: 30 }}
          />
        </View>
        <View style={{ flex: 1 }}>
          <View style={{ marginRight: SIZES.padding }}>
            <Text style={{ ...FONTS.largeTitle, color: COLORS.white }}>
              BookTime
            </Text>
          </View>
        </View>

        {/* Points */}
        <TouchableOpacity
          style={{
            backgroundColor: COLORS.primary,
            height: 40,
            paddingLeft: 3,
            paddingRight: SIZES.radius,
            borderRadius: 20,
          }}
          onPress={() => {navigation.navigate("Donate");
          }}
        >
          <View
            style={{
              flex: 1,
              flexDirection: "row",
              justifyContent: "center",
              alignItems: "center",
            }}
          >
            <View
              style={{
                width: 30,
                height: 30,
                alignItems: "center",
                justifyContent: "center",
                borderRadius: 25,
                backgroundColor: "rgba(0,0,0,0.5)",
              }}
            >
              <Image
                source={icons.plus_icon}
                resizeMode="contain"
                style={{ width: 20, height: 20 }}
              />
            </View>
            <Text
              style={{
                marginLeft: SIZES.base,
                color: COLORS.white,
                ...FONTS.body3,
              }}
            >
              Donate
            </Text>
          </View>
        </TouchableOpacity>
      </View>
    );
  }
  function renderMyBookSection(myBooks) {
    const renderItem = ({ item, index }) => {
      return (
        <TouchableOpacity
          style={{
            flex: 1,
            marginLeft: index == 0 ? SIZES.padding : 0,
            marginRight: SIZES.radius,
          }}
          onPress={() => navigation.navigate("BookDetail", { book: item })}
        >
          {/* Book Cover */}
          <Image
            source={item.bookCover}
            resizeMode="cover"
            style={{
              width: 180,
              height: 250,
              borderRadius: 20,
            }}
          />
          {/* Book Info */}
          <View
            style={{
              marginTop: SIZES.radius,
              flexDirection: "row",
              alignItems: "center",
              justifyContent: "center",
            }}
          >
            <Text
              style={{ marginLeft: 5, ...FONTS.body4, color: COLORS.lightGray }}
            >
              {item.bookName}
            </Text>
          </View>
        </TouchableOpacity>
      );
    };
    return (
      <View style={{ flex: 1 }}>
        {/* Header */}
        <View
          style={{
            paddingHorizontal: SIZES.padding,
            paddingTop: SIZES.padding,
            flexDirection: "row",
            justifyContent: "space-between",
          }}
        >
          <Text style={{ ...FONTS.h2, color: COLORS.primary }}>All Books</Text>
          <TouchableOpacity onPress={() => navigation.navigate("All Books")}>
            <Text
              style={{
                ...FONTS.body3,
                color: COLORS.lightGray,
                alignSelf: "flex-start",
                textDecorationLine: "underline",
              }}
            >
              see more
            </Text>
          </TouchableOpacity>
        </View>

        {/* Books */}
        <View style={{ flex: 1, marginTop: SIZES.padding }}>
          <FlatList
            data={myBooks}
            renderItem={renderItem}
            keyExtractor={(item) => `${item.id}`}
            horizontal
            showsHorizontalScrollIndicator={false}
          />
        </View>
      </View>
    );
  }

  function renderCategoryHeader() {
    const renderItem = ({ item }) => {
      return (
        <TouchableOpacity
          style={{ flex: 1, marginRight: SIZES.padding }}
          onPress={() => setSelectedCategory(item.id)}
        >
          {selectedCategory == item.id && (
            <Text style={{ ...FONTS.h2, color: COLORS.primary }}>
              {item.categoryName}
            </Text>
          )}
          {selectedCategory != item.id && (
            <Text style={{ ...FONTS.h2, color: COLORS.lightGray }}>
              {item.categoryName}
            </Text>
          )}
        </TouchableOpacity>
      );
    };

    return (
      <View style={{ flex: 1, paddingLeft: SIZES.padding }}>
        <FlatList
          data={categories}
          showsHorizontalScrollIndicator={false}
          renderItem={renderItem}
          keyExtractor={(item) => `${item.id}`}
          horizontal
        />
      </View>
    );
  }

  function renderCategoryData() {
    var books = [];
    var selectedCategoryBooks = categories.filter(
      (a) => a.id == selectedCategory
    );
    if (selectedCategoryBooks.length > 0) {
      books = selectedCategoryBooks[0].books;
    }

    {/*Start Add Book mark to thelocalStorge*/}

    const addBookMark =  (value) => {
      try {
        let newElement = value.item;

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
              `you added ${newElement.bookName} to your Bookmarks`
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
      } catch (e) {
        // saving error
      }
    };

    {
      /*End Add Book mark to thelocalStorge*/
    }

    const renderItem = ({ item }) => {
      return (
        <View style={{ marginVertical: SIZES.base }}>
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
                  style={{
                    width: 20,
                    height: 20,
                    tintColor: COLORS.lightGray,
                  }}
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
              style={[
                !marks.some((a) => a.bookName == item.bookName)
                  ? { width: 20, height: 20, tintColor: "gray" }
                  : { width: 20, height: 20, tintColor:COLORS.lightRed },
              ]}
            />
          </TouchableOpacity>
        </View>
      );
    };

    return (
      <View
        style={{ flex: 1, marginTop: SIZES.radius, paddingLeft: SIZES.padding }}
      >
        <FlatList
          data={books}
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
      <View style={{ height: 100 }}>
        {renderHeader()}
        {HorizontalLineDivider()}
      </View>

      {/* Body Section */}
      <ScrollView style={{ marginTop: SIZES.radius }}>
        {/* Categories Section */}
        <View style={{ marginTop: SIZES.padding }}>
          <View>{renderCategoryHeader()}</View>
          <View>{renderCategoryData()}</View>
        </View>
        {/* Books Section */}
        <View>{renderMyBookSection(myBooks)}</View>
      </ScrollView>
    </SafeAreaView>
  );
};

export default Home;
